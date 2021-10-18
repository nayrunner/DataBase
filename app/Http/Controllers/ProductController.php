<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(5);
        return view('product.product',compact('products'));
    } 

    public function store(Request $request){
        $request -> validate([
            'product_name' => 'required|max:10|unique:products'
        ],
        [
            'product_name.required' => "กรุณากรอก",
            'product_name.max' => "กรอกเกิน10ตัวอักษร",
        ]
    );

    $product = new Product;
    $product -> product_name = $request -> product_name;
    $product -> save();
    return redirect()->back()->with('success','บันทึกข้อมูลเสร็จสิ้น');
    }

}
