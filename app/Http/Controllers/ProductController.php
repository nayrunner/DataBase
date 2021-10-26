<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Order;
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

    public function productCus(){
        $products = Product::all();
        return view('product.productCus',compact('products'));
    }

    public function edit($id){
    
        $products = Product::find($id);
        return view('product.edit',compact('products'));
    }


    public function update(Request $request,$id){
        $request -> validate([
            'product_name' => 'required|max:50',
            'product_vendor' => 'required|max:50',
            'scale' => 'required|max:50',
        ],
    );

    Product::find($id)->update([
        'product_name' => $request -> product_name,
        'product_vendor' => $request -> product_vendor,
        'scale' => $request -> scale,
    ]);
    return redirect()->route('product')->with('success','อัพเดตข้อมูลเสร็จสิ้น');   
    }

    public function purchase($id,$user_id){
    
        $products = Product::find($id);
        $orders = new Order;
        $orders -> customer_id = $user_id;
        $orders -> status = "waiting for payment";
        $orders -> save();
        return redirect()->route('productCus')->with('success','ซื้อเสร็จสิ้น');   

    }
}
