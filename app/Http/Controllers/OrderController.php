<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function addToCart(Request $request) {

        // Validar y agregar producto al carrito
        $cart = session()->get('cart', []);
        $id = $request->id;

        // Si ya existe el producto en carrito, aumentar cantidad
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Si no existe, agregarlo
            $cart[$id] = [
                "id" => $id,
                "name" => $request->name,
                "price" => $request->price,
                "quantity" => 1,
                "image" => $request->image ?? null,
            ];
        }
        
        if($request->has('qty')) {
            $request->qty = (int)$request->qty;
            $cart[$id]['quantity'] = (int)$request->qty;
        }

        //$subtotal = number_format($subtotal, 2);

        session()->put('cart', $cart);
        session()->put('subtotal', $this->calculateSubtotal($cart));
        session()->put('cart_count', $this->calculateCount($cart));

        return back()->with([
            'status' => 'success',
            'message' => 'Producto agregado al carrito',
        ]);
    }

    public function deleteFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->put('subtotal', $this->calculateSubtotal($cart));
            session()->put('cart_count', $this->calculateCount($cart));
        }

        return back()->with([
            'status' => 'success',
            'message' => 'Producto eliminado del carrito'
        ]);
    }

    private function calculateSubtotal($cart) {

        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    private function calculateCount($cart) {

        $count = 0;

        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }

    public function checkout()
    {
        // Aquí traerías los datos del carrito
        $cart = session('cart', []);
        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        // Guardar datos generales de la orden
        $order = Order::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'address'        => $request->address,
            'payment_method' => $request->payment_method,
            'status'         => 'pendiente'
        ]);

        // Guardar los productos del carrito
        foreach (session('cart', []) as $product) {
            $order->items()->create([
                'product_name' => $product['name'],
                'quantity'     => $product['quantity'],
                'price'        => $product['price'],
                'subtotal'     => $product['price'] * $product['quantity']
            ]);
        }

        // Vaciar carrito
        session()->forget('cart');

        return redirect()->route('order.status', $order->id)
            ->with('success', 'Orden registrada, pendiente de pago.');
    }

    public function show(Order $order)
    {
        return view('order-status', compact('order'));
    }

    public function uploadProof(Request $request, Order $order)
    {
        $request->validate([
            'proof' => 'required|image|max:2048'
        ]);

        $path = $request->file('proof')->store('proofs', 'public');
        $order->update(['proof_image' => $path]);

        return back()->with('success', 'Comprobante subido correctamente.');
    }
}
