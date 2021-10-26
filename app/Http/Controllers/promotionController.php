<?php

namespace App\Http\Controllers;

use App\Models\Promotion as ModelsPromotion;
use Illuminate\Http\Request;

class promotionController extends Controller
{
    public function promotion(){
        $promotions = ModelsPromotion::paginate(5);
        return view('promotion.promotion',compact('promotions'));
    } 

    public function store(Request $request){
        $request -> validate([
            'code' => 'required|max:10|unique:promotions',
            'discount' => 'required|max:10',
            'amount' => 'required|max:10',
            'expired_date' => 'required|max:10',
        ]
    );

    $promotions = new ModelsPromotion;
    $promotions -> code = $request -> code;
    $promotions -> discount = $request -> discount;
    $promotions -> amount = $request -> amount;
    $promotions ->expired_date = $request -> expired_date;
    $promotions -> save();
    return redirect()->back()->with('success','บันทึกข้อมูลเสร็จสิ้น');
    }

    public function edit($id){
        $promotions = ModelsPromotion::find($id);
        return view('promotion.edit',compact('promotions'));
    }

    public function update(Request $request,$id){
        $request -> validate([
            'code' => 'required|max:10',
            'discount' => 'required|max:10',
            'amount' => 'required|max:10',
            'expired_date' => 'required|max:10',
        ],
    );
    ModelsPromotion::find($id)->update([
        'code' => $request -> code,
        'discount' => $request -> discount,
        'amount' => $request -> amount,
        'expired_date'  => $request -> expired_date,
    ]);
    return redirect()->route('promotion')->with('success','อัพเดตข้อมูลเสร็จสิ้น');   
    }

}
