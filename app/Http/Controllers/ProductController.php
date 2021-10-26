<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Order;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    function executeQuery($query)
{
    $connect = mysqli_connect("http://127.0.0.1:8000", "root", "", "basic");
    $result = mysqli_query($connect, $query);
    return $result;
}


    public function index(){
        $products = Product::paginate(5);
        return view('product.product',compact('products'));
    } 

    public function store(Request $request){
        $request -> validate([
            'product_name' => 'required|max:10|unique:products',
            'product_vendor' => 'required|max:10',
            'scale' => 'required|max:10',
            'price' => 'required|max:10',
            'remain_in_stock' => 'required|max:10',
        ]
    );

    $product = new Product;
    $product -> product_name = $request -> product_name;
    $product -> product_vendor = $request -> product_vendor;
    $product -> scale = $request -> scale;
    $product -> price = $request -> price;
    $product -> remain_in_stock = $request -> remain_in_stock;
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
            'remain_in_stock' => 'required|max:50',
        ],
    );

    Product::find($id)->update([
        'product_name' => $request -> product_name,
        'product_vendor' => $request -> product_vendor,
        'scale' => $request -> scale,
        'remain_in_stock'  => $request -> remain_in_stock,
    ]);
    return redirect()->route('product')->with('success','อัพเดตข้อมูลเสร็จสิ้น');   
    }

    public function purchase($id,$user_id){
    
        $products = Product::find($id);
        $orders = new Order;
        $orders -> customer_id = $user_id;
        $orders -> status = "waiting for payment";
        $orders -> price =  $products ->  price;
        $orders -> product_id =  $products ->  id;
        $orders -> save();
        $protemp = Product::find($id);
        Product::find($id)->update([
            'remain_in_stock' => $protemp -> remain_in_stock -1
        ]);
        return redirect()->route('productCus')->with('success','วางออร์เดอร์เสร็จสิ้น โปรดชําระเงิน');   

    }
}
