<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    public function index(){
        $category =Category::all();
        if($category->count()>0){
        return response()->json(['success'=>true,
        'msg'=>"Category list",
            'data'=>$category]);
        }else{
            return response()->json(['success'=>true,
            'msg'=>"No data is available",
                'data'=>$category]);
            }
    }
    public function category_product(){
        $category = Product::with('category')->get();

        if($category->count()>0){
        return response()->json(['success'=>true,
        'msg'=>"products list of specific category",
            'data'=>$category]);
        }else{
            return response()->json(['success'=>true,
            'msg'=>"No data is available",
                'data'=>$category]);
            }
    }
}
