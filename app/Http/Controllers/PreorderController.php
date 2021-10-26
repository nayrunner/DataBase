<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class PreorderController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('order.preorder',compact('products'));
    }
    
    
    public function preorderpurchase($id,$user_id){
    
        $products = Product::find($id);
        $orders = new Order;
        $orders -> customer_id = $user_id;
        $orders -> status = "preorder and waiting for payment";
        $orders -> price =  $products ->  price/2;
        $orders -> product_id =  $products ->  id;
        $orders -> save();
        return redirect()->route('preorder')->with('success','วางออร์เดอร์เสร็จสิ้น โปรดชําระเงิน');   

    }


    
}
