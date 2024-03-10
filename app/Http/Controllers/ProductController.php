<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id'=>$request->category_id,
            'picture' => $request->file('picture')->store('public/images/products'),
        ]);
        return response()->json([
            'message' => 'Product was created',
            'product' => new ProductSingleResource($product)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
       return new ProductSingleResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
       
       $product->update([
            'picture' => $request->file('picture')->store('public/images/products'),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id'=>$request->category_id,
          
        ]);
        return response()->json([
            'message' => 'Product was Updated',
            'product' => new ProductSingleResource($product)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->picture) {
            Storage::delete($product->picture);
        }
        $product->variations()->delete();
        $product->delete();

        return response()->json([
            'message' => 'Product was Deleted',
        ]);
    }
}
