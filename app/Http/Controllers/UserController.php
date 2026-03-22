<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index() {

        // Fetch the authenticated user
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $totalSpent = $orders->sum('total');

        return view('users.dashboard', compact('user', 'totalSpent'));
    }
}
