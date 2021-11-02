<?php

namespace App\Repositories\Eloquents;
// use App\Repositories\Contracts\ProductInterface; 
use App\Models\Product;

class ProductRepository 
{
    public function all()
    {
        $items = Product::all();
        // foreach( $items as $item ){
        //     $item->formated_tags = implode(',',$item->tags->pluck('name')->toArray() );
        // }
        return $items;
    }

    public function store($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->image = '';
        $product->description = $request->description;
        $product->price =  $request->price;
        $product->status = 1;
        $product->category_id = $request->category_id;
        $product->save();
        //$product->tags()->attach( $request->tags );
    }

    public function update($request,$id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->image = '';
        $product->description =$request->description;
        $product->price =  $request->price;
        $product->status =  1;
        $product->category_id = $request->category_id;
        $product->save();

       
        // $product->tags()->attach( $request->tags );
    }

    public function find($id){
        return Product::find($id);
    }

    public function destroy($id){
        return Product::delete($id);
    }

    public function findByCategory($category_id){
        return Product::where('category_id')->get();
    }
}