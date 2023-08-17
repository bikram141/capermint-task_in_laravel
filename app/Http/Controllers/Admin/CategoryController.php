<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page="category list";
        $category=Category::get();
        return view('admin.category.index',compact('category','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page="create category form";
        return view('admin.category.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Category_title'=>'required',
            'Status'=>'required'
        ]);
       $category=new Category;
       $category->Category_title=$request->get('Category_title');
       $category->Category_slug=Str::slug($request->get('Category_title'));
       $category->Status=$request->get('Status');
       $category->save();
       $request->session()->flash('alert-success', 'category added successfully');
       return redirect('category-list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page="category edit form";
        $category=Category::find($id);
        return view('admin.category.edit',compact('category','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'Category_title'=>'required',
            'Status'=>'required'
        ]);
       $category=Category::find($id);
       $category->Category_title=$request->get('Category_title');
       $category->Category_slug=Str::slug($request->get('Category_title'));
       $category->Status=$request->get('Status');
       $category->save();
       $request->session()->flash('alert-success', 'category updated successfully');
       return redirect('category-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category= Category::find($id);
        $category->delete();
        $request->session()->flash('alert-danger',' deleted successfully');
        return redirect('category-list');
    }
}
