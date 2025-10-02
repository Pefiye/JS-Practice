<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $currentPage = $request->get('page', 1);
        $products = Product::all();
        $totalPage = ceil($products->count() / 5);
        $products = Product::limit(5)->offset(($currentPage - 1) * 5)->get();
        return view('product', compact('products', 'currentPage', 'totalPage'));
    }

    
    public function storeProductPage(){
        return view('addProduct');
    }

    public function storeProduct(Request $request){
        // Validasi input
        $validator = $request->validate([
            'nama' => 'required|min:1|max:255',
            'type' => 'required|min:1|max:60',
            'stock' => 'required|integer|min:1'
        ]);

        if(!$validator){
           return redirect()->back()->with('message', 'Data Yang Diberikkan Tidak Valid');
        }
        
        $create = Product::insert($validator);
        if($create){
            return redirect()->to('/')->with('message', 'Berhasil Dalam Menyimpan Data!');
        }else{
            return redirect()->back()->with('message', 'Gagal dalam menyimpan data');
        }
    }

    public function updateProductPage(Request $request, string $product){
        $product = Product::where('id', '=', $product)->get();
        $product = $product->count() > 0 ? $product[0] : [];
        return view('editProduct', compact('product'));
    }
    public function updateProduct(Request $request, string $product){
        // Validasi input
        $validator = $request->validate([
            'nama' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        if(!$validator){
           return redirect()->back()->with('message', 'Data Yang Diberikkan Tidak Valid');
        }
        
        $update = Product::where('id', $product)
            ->update($validator);
        if($update){
            return redirect()->to('/')->with('message', 'Berhasil Dalam Merubah Data!');
        }else{
            return redirect()->back()->with('message', 'Gagal dalam merubah data');
        }
    }
    public function deleteProduct(Request $request, string $product){
        
        $delete = Product::where('id', $product)
            ->delete();
        if($delete){
            return redirect()->to('/')->with('message', 'Berhasil Dalam Menghapus Data!');
        }else{
            return redirect()->back()->with('message', 'Gagal dalam menghapus data');
        }
    }
}
