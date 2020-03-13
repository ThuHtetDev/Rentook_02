<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Product;
class ProductController extends Controller
{
    //detail data are shown with ProductResource toarray
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);   
    }
    // all data are shown with ProductResourceCollection toarray paginate class
    public function index(): ProductResourceCollection
    {
        return new ProductResourceCollection(Product::paginate());
    }
    //
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
        $product = Product::create($request->all());
        return new ProductResource($product);
    }
    public function update(Person $person, Request $request): ProductResource
    {
        $person->update($request->all());
        return new ProductResource($product);
    }
}
