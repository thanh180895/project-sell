<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $search_text = $request->search;
            $items = Product::where('name','LIKE','%'.$search_text.'%')->with('category')->paginate(3);
        }else {
            $items = Product::with('category')->paginate(4);
        } 
        $params = [
            'items' => $items
        ];
        return view('admin.products.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function search()
    // {
    //     $search_text = $_GET['query'];
    //     $products = Product::where('name','LIKE','%'.$search_text.'%')->with('category')->get();

    //     return view('admin.products.search',compact('products'));
    // }

    public function create()
    {
        $categories = Category::all();
        // $categories = $categories->pluck('name','id')->toArray();

        $params = [
            'categories'  => $categories
        ];

        return view('admin.products.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->status      = $request->status;

        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/stogare/images/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Tạo sản phẩm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $categories = Category::all();
        $item       = Product::find($id);

        // $categories = $categories->pluck('name','id')->toArray();

        $params = [
            'categories'        => $categories,
            'item'              => $item,
        ];
        return view('admin.products.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProductRequest $request, $id)
    {
        $product              = Product::find($id);
        $product->name        = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->status      = $request->status;

        $get_image = $request->image;
        if ($get_image) {
            $path = 'public/stogare/images/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/stogare/images/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $item = Product::find($id);
        $path = 'public/stogare/images' . $item->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $item->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công !');
    }

    //pages

    public function details_product($id){
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 0)->get();

        $products  = Product::find($id);
        // dd($products->category_id );
        $category_id = $products->category_id;
    
        $related_product  = Product::where('category_id','=',$category_id)->get();

        return view('Pages.product.show_details',compact(['categories','products','related_product','id']));
    }
}
