<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // This controller will handle category-related actions
    // such as listing categories, creating new categories,
    // updating existing categories, and deleting categories.

    // Methods for handling categories will be added here
    // as needed in the future.

    public function index()
    {
        // Logic to list all categories
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
}
