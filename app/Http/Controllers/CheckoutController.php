<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Adjusment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as Session;
use Stripe\Customer;
use PaypalServerSdkLib\PaypalServerSdkClientBuilder;
use PaypalServerSdkLib\Authentication\ClientCredentialsAuthCredentialsBuilder;
use PaypalServerSdkLib\Logging\LoggingConfigurationBuilder;
use PaypalServerSdkLib\Logging\RequestLoggingConfigurationBuilder;
use PaypalServerSdkLib\Logging\ResponseLoggingConfigurationBuilder;
use Psr\Log\LogLevel;
use PaypalServerSdkLib\Models\Builders\OrderRequestBuilder;
use PaypalServerSdkLib\Models\CheckoutPaymentIntent;
use PaypalServerSdkLib\Models\Builders\PurchaseUnitRequestBuilder;
use PaypalServerSdkLib\Models\Builders\AmountWithBreakdownBuilder;
use PaypalServerSdkLib\Models\Builders\AmountBreakdownBuilder;
use PaypalServerSdkLib\Models\Builders\MoneyBuilder;
use PaypalServerSdkLib\Models\Builders\ItemBuilder;
use PaypalServerSdkLib\Models\ItemCategory;
use PaypalServerSdkLib\Models\Builders\ShippingDetailsBuilder;
use PaypalServerSdkLib\Models\Builders\ShippingNameBuilder;
use PaypalServerSdkLib\Models\Builders\ShippingOptionBuilder;
use PaypalServerSdkLib\Models\ShippingType;
use PaypalServerSdkLib\Environment;
use PaypalServerSdkLib\Models\Builders\PaypalWalletBuilder;
use PaypalServerSdkLib\Models\Builders\PaypalWalletExperienceContextBuilder;
use PaypalServerSdkLib\Models\ShippingPreference;
use PaypalServerSdkLib\Models\PaypalExperienceLandingPage;
use PaypalServerSdkLib\Models\PaypalExperienceUserAction;
use PaypalServerSdkLib\Models\Builders\CallbackConfigurationBuilder;
use PaypalServerSdkLib\Models\Builders\PhoneNumberWithCountryCodeBuilder;
use PaypalServerSdkLib\Models\Builders\PaymentSourceBuilder;
use PaypalServerSdkLib\Models\CallbackEvents;
use Exception;
use Illuminate\Support\Facades\Session as SessionFacade;


class CheckoutController extends Controller {
    
    public function index() {

        $adjustments = Adjusment::all();
        $uid = Auth::id();
        $addresses = Address::where('user_id', $uid)->get();

        return view('checkout.start', compact('adjustments', 'addresses'));
    }

    public function checkout(Request $request) {

        if ($request->shipping_address === "non") {
            return redirect()->back()->withErrors(['shipping_address' => 'Seleccione una dirección de envío.']);
        }

        //var_dump($request->all());

        //Registrando la orden antes del pago para asegurar que tenemos un registro de la compra, incluso si el proceso de pago falla o es abandonado por el usuario.
        $order_id = $this->registerOrder($request->cart_data, $request->shipping_address, $request->total_amount);
        SessionFacade::put('cartend', $request->cart_data);
        SessionFacade::put('totalend', $request->total_amount);
        SessionFacade::put('order_id', $order_id);

        if ($request->pay_method === "stripe") {

            $cart_data = json_decode($request->cart_data, true);
            return redirect()->away($this->setStripePayment($cart_data, $request->total_amount, $order_id)->url);

        } else if ($request->pay_method === "paypal") {

            //return $this->setPaypalPayment($request, null);
    
        } else {
            return redirect()->back()->withErrors(['pay_method' => 'Método de pago no válido.']);
        }
    }

    private function registerOrder($cart_data, $shipping_address_id, $total_amount) {
        // Aquí se implementaría la lógica para registrar la orden en la base de datos
        // incluyendo los detalles del carrito y la dirección de envío seleccionada.

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name . ' ' . Auth::user()->last_name,
            'email' => Auth::user()->email,
            'address' => $shipping_address_id, // Aquí se debería obtener la dirección completa desde el ID
            'payment_method' => 'stripe', // o 'paypal' dependiendo de la selección del usuario
            'total' => $total_amount, // Este valor debería calcularse a partir del carrito
        ]);

        $order->save();

        foreach (json_decode($cart_data, true) as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ])->save();
        }

        return $order->id;
    }

    public function success() { 
        
        $order_id = SessionFacade::get('order_id');
        $order = Order::find($order_id);
        $order->status = 'confirmado';
        $order->save();

        $total = SessionFacade::get('totalend');
        $cart_data = SessionFacade::get('cartend');
        
        $this->cleanCart();

        return view('checkout.pass', compact('order_id', 'total', 'cart_data'));   
    }

    public function cancel() {  

        $order_id = SessionFacade::get('order_id');
        $order = Order::find($order_id);
        $order->status = 'cancelado';
        $order->save();

        $total = SessionFacade::get('totalend');

        $this->cleanCart();

        return view('checkout.fail', compact('order_id', 'total'));   
    }

    private function setStripePayment($cart_data, $total, $order_id) {
        Stripe::setApiKey(config('stripe.sk'));

        $customer = Customer::create([
            'email' => Auth::user()->email,
        ]);

        $total = round($total * 100); // Stripe maneja los montos en centavos

        $session = Session::create([
            'customer' => $customer->id,
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => 'Compra en Mexicoin',
                        ],
                        'unit_amount' => $total, // Stripe maneja los montos en centavos
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return $session;
    }

    private function cleanCart() {
        SessionFacade::forget('cart'); // Limpiar el carrito después de una compra exitosa
        SessionFacade::forget('total'); // Limpiar el total después de una compra exitosa
        SessionFacade::forget('adjustments'); // Limpiar los ajustes después de una compra exitosa
        SessionFacade::forget('cartend'); // Limpiar el carrito temporal de checkout
        SessionFacade::forget('totalend'); // Limpiar el total temporal de checkout
        SessionFacade::forget('order_id'); // Limpiar el ID de orden temporal de checkout
    }
    
}
