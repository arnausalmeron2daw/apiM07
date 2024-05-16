<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();

    if ($products->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No products found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $products
    ], 200);
}



    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product with id ' . $id . ' not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }





    public function update(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Product with id ' . $id . ' not found'
        ], 404);
    }

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->save();

    return response()->json([
        'success' => true,
        'data' => $product
    ], 200);
}


public function destroy($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Product with id ' . $id . ' not found'
        ], 404);
    }

    // Eliminar el producto
    $product->delete();

    return response()->json([
        'success' => true,
        'message' => 'Product deleted successfully'
    ], 200);
}


public function store(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric'
    ]);

   
    $product = Product::create($validatedData);

    return response()->json([
        'success' => true,
        'data' => $product
    ], 201);
}


}

