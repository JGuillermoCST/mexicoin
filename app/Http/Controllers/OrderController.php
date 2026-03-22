<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

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

    public function deleteFromCart($id) {
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

    public function index() {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('users.orders.main', compact('orders'));
    }

    public function show($id) {
        $order = Order::where('id', $id)->first();
        return view('users.orders.details', compact('order'));
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
