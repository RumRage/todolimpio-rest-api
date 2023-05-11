<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ProductCollection;

class ProductController extends Controller
{
    //
<<<<<<< HEAD
 
=======

>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
    public function index()
    {
        return new ProductCollection(Product::all());
    }
<<<<<<< HEAD
    
=======

>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return response()->json("Producto creado correctamente");
    }
<<<<<<< HEAD
    
=======

>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json("Producto actualizado correctamente");
    }
<<<<<<< HEAD

=======
    
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json("Producto eliminado correctamente");
    }
<<<<<<< HEAD

=======
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
}
