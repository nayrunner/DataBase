<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = department::paginate(5);
        return view('admin.department.index',compact('departments'));
    } 

    public function store(Request $request){
        $request -> validate([
            'user_id' => 'required',
            'department_name' => 'required|max:10',
        ],
    );

    $department = new department;
    $department -> user_id = $request -> user_id;
    $department -> department_name = $request -> department_name;
    $department -> save();
    return redirect()->back()->with('success','บันทึกข้อมูลเสร็จสิ้น');
    }
}
