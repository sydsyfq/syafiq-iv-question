<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Available product list
    public function productList()
    {
        $available_product = Product::select('id','name', 'price')->where('status', '=', 'In Stock')->get();

        return response()->json([
            'status' => 1,
            'message' => "Available Product List",
            'data' => $available_product
        ]);
    }

    //Product details
    public function productDetails($product_id)
    {
        if (Product::where([
            'id' => $product_id
        ])->exists()) {
            
            $product = Product::find($product_id)->makeHidden(['created_at', 'updated_at']);

            return response()->json([
                'status' => true,
                'message' => "Product data found",
                'data' => $product
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Product does not exist"
            ]);
        }
    }
}
