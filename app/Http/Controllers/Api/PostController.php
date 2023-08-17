<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PostController extends Controller
{
    public function show($id)
    {
        $product=Product::where('id',$id)->get();

        if($product->count()>0){
            return response()->json(['success'=>true,
            'msg'=>"product details",
                'data'=>$product]);
            }else{
                return response()->json(['success'=>true,
                'msg'=>"No data is available",
                    'data'=>$product]);
                }

    }       

    public function search(Request $request)
    {
        $search_text = $request->input('search_text');
        $result= Product::where('Product_title', 'like', '%' . $search_text . '%')->get();
        if($result->count()>0){
            return response()->json(['success'=>true,
            'msg'=>"the search result is below",
                'data'=>$result]);
            }else{
                return response()->json(['success'=>true,
                'msg'=>"there is no data matching with your search data",
                    'data'=>$result]);
                }
        return response()->json($result);
    }
}
