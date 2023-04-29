<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $products = Product::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        return view('products.index', ['products' => $products])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $product = new Product;

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $file_name);
            $product->image = $file_name;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $product->save();
        return redirect()->route('products.index')->with('success', 'Produto adicionado com sucesso.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $file_name = $request->hidden_product_image;

        if ($request->image != '') {
            if ($request->hasFile('image')) {
                $file_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $file_name);
                $product->image = $file_name;
            }
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto alterado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image_path = public_path() . "/images/";
        $image = $image_path . $product->image;
    
        if (file_exists($image)) {
            @unlink($image);
        }
    
        $product->delete();
        return redirect('products')->with('success', 'Produto apagado com sucesso!');
    }
    
}