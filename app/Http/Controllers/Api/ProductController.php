<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'message' => 'List Data Products',
            'data' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'sku'   => 'required|unique:products,sku'
        ]);

        $product = Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'sku'   => $request->sku
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product Created Successfully',
            'data' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Product',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }

        $product->update([
            'name'  => $request->name ?? $product->name,
            'price' => $request->price ?? $product->price,
            'stock' => $request->stock ?? $product->stock,
            'sku'   => $request->sku ?? $product->sku
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product Updated Successfully',
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Deleted Successfully'
        ]);
    }
}
