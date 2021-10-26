<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Promotion;
use App\Models\User;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(10);
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
            'status' => 'required|max:50',
            'comment'=> 'required|max:50',
        ],
    );

    Order::find($id)->update([
        'shipped_date' => $request -> shipped_date,
        'status' => $request->status,
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
        $promotions = Promotion::all();
        return view('order.cusedit',compact('orders','promotions'));
    }

    public function cusupdate(Request $request,$id,$user_id){
        //dd($id,$request -> department_name);
        $request -> validate([
            'payment' => 'required|max:50',
            'require_date'=> 'required|max:50',
            'promotioncode' => 'max:50',
        ],
    );

    $ordertemp = Order::find($id);

    if($ordertemp -> status  == "waiting for payment"){
    Order::find($id)->update([
        'payment' => $request -> payment,
        'require_date' => $request -> require_date,
        'promotioncode' => $request -> promotioncode,
        'status' => "in progress"
    ]);
}

    if($ordertemp -> status  == "preorder and waiting for payment"){
        Order::find($id)->update([
            'payment' => $request -> payment,
            'require_date' => $request -> require_date,
            'promotioncode' => $request -> promotioncode,
            'status' => "Preorder in progress"
        ]);
    }


    $membertemp = User::find($user_id);
    $promotions = Promotion::all();

    foreach($promotions as $row){
        if($row->code == $request -> promotioncode){
            Order::find($id)->update([
                'price' => $ordertemp -> price - $row -> discount,
            ]);
            Promotion::find($row -> id)->update([
                'amount' => $row -> amount -1,
            ]);
        }
    }

    User::find($user_id)->update([
        'memberpoint' => $membertemp->memberpoint + (($ordertemp->price /100)*3)
    ]);
    return redirect()->route('ordercus')->with('success','อัพเดตข้อมูลเสร็จสิ้น');
        
    }

    public function cusdeny($id){
        Order::find($id)->update([
            'status' => "canceled",
        ]);
        return redirect()->route('ordercus')->with('success','ยกเลิกออเดอร์เสร็จสิ้น');
    }

}
