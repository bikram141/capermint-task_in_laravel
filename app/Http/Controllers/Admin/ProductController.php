<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page="product list";
        $product=Product::with('category')->get();
        return view('admin.product.index',compact('product','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page="create product form";
        return view('admin.product.create',compact('page'));
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
            'Product_title'=>'required',
            'Categories'=>'required',
            'Featured_image'=>'required|mimes:png,jpeg,jpg',
            'Product_description'=>'required',
            'Status'=>'required',
        ]);
     

        if($request->hasfile('Gallery')){
            foreach ($request->file('Gallery') as $image) {
                $name =$image->getClientOriginalName();
                $image->move(public_path().'/gallery',$name);
                $gallery[]=$name;
            }
        }

        $product=new Product();
        $product->Product_title=$request->get('Product_title');
        $product->Product_slug=Str::slug($request->get('Product_title'));
        $product->Categories=$request->get('Categories');
        if($request->hasfile('Featured_image'))
        {
            $file = $request->file('Featured_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Featured_image/', $filename);
            $product->Featured_image = $filename;
        }
        $product->Gallery=json_encode($gallery);
        $product->Product_description=$request->get('Product_description');
        $product->Status=$request->get('Status');
      //dd($product);
        $product->save();
        $request->session()->flash('alert-success', 'product added successfully');
        return redirect('product-list');
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
        $page="product edit form";
        $product=Product::find($id);
        return view('admin.product.edit',compact('product','page'));
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
            'Product_title'=>'required',
            'Categories'=>'required',
            'Product_description'=>'required',
            'Status'=>'required',
        ]);
     

        if($request->hasfile('Gallery')){
            foreach ($request->file('Gallery') as $image) {
                $name =$image->getClientOriginalName();
                $image->move(public_path().'/gallery',$name);
                $gallery[]=$name;
            }
        }

        $product=Product::find($id);
        $product->Product_title=$request->get('Product_title');
        $product->Product_slug=Str::slug($request->get('Product_title'));
        $product->Categories=$request->get('Categories');
        if($request->hasfile('Featured_image'))
        {
            $file = $request->file('Featured_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Featured_image/', $filename);
            $product->Featured_image = $filename;
        }
        $product->Gallery=json_encode($gallery);
        $product->Product_description=$request->get('Product_description');
        $product->Status=$request->get('Status');
      //dd($product);
        $product->save();
        $request->session()->flash('alert-success', 'product added successfully');
        return redirect('product-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product= Product::find($id);
        $product->delete();
        $request->session()->flash('alert-danger',' deleted successfully');
        return redirect('product-list');
    }
}
