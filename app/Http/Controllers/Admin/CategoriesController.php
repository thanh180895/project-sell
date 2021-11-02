<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::paginate(5);
        $params = [
            'items' => $items
        ];
        return view('admin.categories.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->category_name    = $request['category_name'];
        $category->category_desc    = $request['category_desc'];
        $category->category_status  = $request['category_status'];

        $category->save();



        // $category = new Category();

        // $category ->Category::create($request->all());
        // $request->session()->flash('success', 'Thêm danh mục thành công');
        return redirect()->route('categories.index')->with('success', 'Tạo mới danh mục thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $item = Category::find($id);
        // $params = [
        //     'item'   => $item
        // ];
        // return view('admin.categories.show',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Category::find($id);
        $params = [
            'item' => $item
        ];
        return view('admin.categories.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $item = Category::find($id);
        $item->category_name   = $request->category_name;
        $item->category_desc   = $request->category_desc;
        $item->category_status = $request->category_status;

        $item->save();

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::find($id);
        $item->delete();

        return redirect()->route('categories.index')->with('success', 'Xóa sản phẩm thành công !');
    }

    //Page

    public function show_category($id)
    {
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 0)->get();

        $products = Product::where('category_id','=',$id)->get();

        $category_name = Category::where('categories.id', $id)->limit(1)->get();

        return view('pages.category.show_category',compact(['categories','products','category_name']));
    }
}
