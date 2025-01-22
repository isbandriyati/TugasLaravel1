<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan halaman form untuk menambahkan produk
    public function create()
    {
        // Mengambil semua kategori untuk dropdown list
        $categories = Category::all();
        
        // Menampilkan form untuk menambahkan produk baru
        return view('product.create', compact('categories'));
    }

    // Menyimpan produk yang baru dibuat
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Validasi kategori
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Membuat instance produk baru
        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->category_id = $validated['category_id'];

        // Menyimpan gambar produk jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        // Menyimpan produk ke dalam database
        $product->save();

        // Redirect ke halaman home atau halaman lain setelah produk berhasil disimpan
        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Metode untuk menampilkan produk berdasarkan kategori
    public function filterByCategory($category)
    {
        // Ambil produk berdasarkan kategori
        $products = Product::whereHas('category', function($query) use ($category) {
            $query->where('name', $category);
        })->get();
        
        // Kembalikan tampilan dengan produk yang sudah difilter berdasarkan kategori
        return view('home', compact('products'));
    }

    // Metode untuk menampilkan produk berdasarkan harga
    public function filterByPrice($price)
    {
        // Filter produk berdasarkan harga
        if ($price == 'low') {
            $products = Product::orderBy('price', 'asc')->get(); // Harga terendah
        } elseif ($price == 'high') {
            $products = Product::orderBy('price', 'desc')->get(); // Harga tertinggi
        }

        // Kembalikan tampilan dengan produk yang sudah difilter berdasarkan harga
        return view('home', compact('products'));
    }
}
