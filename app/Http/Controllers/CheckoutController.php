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
use Exception;
use Illuminate\Support\Facades\Session as SessionFacade;
use Laravel\Cashier\Cashier;
use App\Models\User;

class CheckoutController extends Controller {
    
    public function index() {

        $user = Auth::user();
        $adjustments = Adjusment::all();
        $uid = Auth::id();
        $addresses = Address::where('user_id', $uid)->get();
        $subscription = $user->subscription;

        return view('checkout.start', compact('adjustments', 'addresses', 'user', 'subscription'));
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

        $customer = $this->getOrCreateCustomer(Auth::user());

        $total = round($total * 100); // Stripe maneja los montos en centavos

        $session = Session::create([
            'customer' => $customer->id,
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => 'Tu compra en Mexicoin',
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

    private function getOrCreateCustomer($user): Customer
    {
        
        $existing = $user->asStripeCustomer();

        if ($existing) {
            // Si el usuario ya tiene un customer_id guardado, reutilizarlo
            return $existing;
        }

        $customer = $user->createAsStripeCustomer();

        return $customer;
    }
    
}
