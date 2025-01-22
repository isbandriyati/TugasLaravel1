<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dari database
        $categories = Category::all();

        // Ambil semua produk dari database
        $products = Product::all();

        // Kirim data kategori dan produk ke tampilan home
        return view('home', compact('categories', 'products'));
    }
}