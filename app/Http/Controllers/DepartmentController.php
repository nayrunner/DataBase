<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = department::paginate(5);
        $trashDepartments = department::onlyTrashed()->paginate(3);
        return view('admin.department.index',compact('departments','trashDepartments'));
    } 

    public function store(Request $request){
        $request -> validate([
            'user_id' => 'required|unique:departments',
            'department_name' => 'required|max:50',
        ],
    );

    $department = new department;
    $department -> user_id = $request -> user_id;
    $department -> id = $request -> user_id;
    $department -> department_name = $request -> department_name;
    $department -> save();

    user::find($request -> user_id)->update([
        'role' => $request -> department_name
    ]);
    return redirect()->back()->with('success','บันทึกข้อมูลเสร็จสิ้น');
    }

    public function edit($id){
        //dd($id);
        $department = Department::find($id);
        return view('admin.department.edit',compact('department'));
    }

    public function update(Request $request,$id){
        //dd($id,$request -> department_name);
        $request -> validate([
            'department_name' => 'required|max:50',
        ],
    );

    Department::find($id)->update([
        'department_name' => $request -> department_name
    ]);
    user::find($id)->update([
        'role' => $request -> department_name
    ]);
    return redirect()->route('department')->with('success','อัพเดตข้อมูลเสร็จสิ้น');
        
    }

    public function softdelete($id){
        $delete = Department::find($id)->delete();
        return redirect()->route('department')->with('success','ลบข้อมูลเสร็จสิ้น');
        
    }

    public function restore($id){
        $restore=Department::withTrashed()-> find($id)->restore();
        return redirect()->route('department')->with('success','กู้คืนข้อมูลเสร็จสิ้น');
    }

    public function forcedelete($id){
        $forcedelete=Department::onlyTrashed()->find($id)->forceDelete();
        user::find($id)->update([
            'role' => 'customer'
        ]);
        return redirect()->route('department')->with('success','ลบข้อมูลอย่างถาวรเสร็จสิ้น');
    }
}
