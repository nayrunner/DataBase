<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(5);
        return view('order.index',compact('orders'));
    } 

    public function edit($id){
        //dd($id);
        $orders = Order::find($id);
        return view('order.edit',compact('orders'));
    }

    public function update(Request $request,$id){
        //dd($id,$request -> department_name);
        $request -> validate([
            'shipped_date' => 'required|max:50',
            'comment'=> 'required|max:50',
        ],
    );

    Order::find($id)->update([
        'shipped_date' => $request -> shipped_date,
        'comment' => $request -> comment
    ]);
    return redirect()->route('order')->with('success','อัพเดตข้อมูลเสร็จสิ้น');
        
    }

    public function ordercus(){
        $orders = Order::all();
        return view('order.ordercus',compact('orders'));
    }

    public function cusedit($id){
        //dd($id);
        $orders = Order::find($id);
        return view('order.cusedit',compact('orders'));
    }

    public function cusupdate(Request $request,$id){
        //dd($id,$request -> department_name);
        $request -> validate([
            'payment' => 'required|max:50',
            'require_date'=> 'required|max:50',
        ],
    );

    Order::find($id)->update([
        'payment' => $request -> payment,
        'require_date' => $request -> require_date,
        'status' => "in progress"
    ]);
    return redirect()->route('ordercus')->with('success','อัพเดตข้อมูลเสร็จสิ้น');
        
    }

}
