<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index() {

        // Fetch the authenticated user
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $totalSpent = $orders->sum('total');
        $ords = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
        $subscription = $user->subscription;

        return view('users.dashboard', compact('user', 'totalSpent', 'ords', 'subscription'));
    }

    public function plusSub() {

        $user = Auth::user();

        return view('users.subscriptions.plus', compact('user'));
    }
}
