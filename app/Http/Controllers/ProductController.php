<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('product');
    }

    
    public function storeProductPage(){
        return view('addProduct');
    }

    public function storeProduct(Request $request){
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

       if($validated){
            dd($validated);          
       }

        return redirect('/products')->with('success', 'Product added successfully!');
    }

    public function updateProductPage(Request $request){

        return view('editProduct');
    }
    public function updateProduct(Request $request){
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

       if($validated){
            dd($validated);          
       }

        return redirect('/products')->with('success', 'Product added successfully!');
    }
    public function deleteProduct(Request $request){
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

       if($validated){
            dd($validated);          
       }

        return redirect('/products')->with('success', 'Product added successfully!');
    }
}
