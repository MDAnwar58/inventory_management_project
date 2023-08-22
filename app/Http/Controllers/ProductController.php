<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function ProductPage()
    {
        return view('pages.dashboard.product-page');
    }
    function CreateProduct(Request $request)
    {
        // return $request->file('img');
        $user_id = $request->header('id');
        $img = $request->file('img');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = $user_id."-".$t."-".$file_name;
        $img_url = "uploads/".$img_name;
        $img->move(public_path('uploads'), $img_url);
        return Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
            'img_url' => $img_url,
            'category_id' => $request->input('category_id'),
            'user_id' => $user_id,
        ]);
    }
    function DeleteProduct(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        $filePath = $request->input('file_path');
        File::delete($filePath);
        return Product::where('id', $product_id)->where('user_id', $user_id)->delete();
    }
    function ProductById(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }
    function ProductList(Request $request)
    {
        $user_id = $request->header('id');
        return Product::where('user_id', $user_id)->get();
    }
    function UpdateProduct(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');

        if ($request->file('img')) {
            # code...
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = $user_id."-".$t."-".$file_name;
            $img_url = "uploads/".$img_name;
            $img->move(public_path('uploads'), $img_url);
            $filePath = $request->input('file_path');
            File::delete($filePath);

            return Product::where('user_id', $user_id)->where('id', $product_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'img_url' => $img_url,
                'category_id' => $request->input('category_id'),
            ]);
        }else{
            return Product::where('user_id', $user_id)->where('id', $product_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'category_id' => $request->input('category_id'),
            ]);
        }
    }
}
