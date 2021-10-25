<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            การจัดการทรัพยากรพนักงาน
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-6">
                <div class ="card">

                    @if(session("success"))
                    <span class ="alert alert-success">{{session('success')}}</span>
                    @endif

                    <div class ="card-header">ตารางแผนก</div>
                    <table class="table table-primary table-striped">
                        <thead>
                    <tr>
        <th scope="col">id</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">ตําแหน่ง</th>
        <th scope="col">แผนก</th>
        <th scope="col">แก้ไขข้อมูล</th>
        <th scope="col">ลบข้อมูล</th>
    </tr>
    </thead>
    <tbody>
        @foreach($departments as $row)
        <tr>
        <td>{{$row -> user_id}}</td>
        <td>{{$row -> user ->name}}</td>
        <td>{{$row -> department_name}}</td>
        <td>{{$row -> department_type}}</td>
        <td><a href="{{url('/department/edit/'.$row-> user_id)}}" class = "btn btn-primary">แก้ไข</a></td>
        <td><a href="{{url('/department/softdelete/'.$row-> user_id)}}" class = "btn btn-danger">ลบ</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$departments -> links()}}
                </div>
                <div class="card my-6">
                    @if(count($trashDepartments)>0)
                <div class ="card-header">ถังขยะ</div>
                    <table class="table table-danger table-striped">
                        <thead>
                    <tr>
        <th scope="col">id</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">ตําแหน่ง</th>
        <th scope="col">แผนก</th>
        <th scope="col">กู้คืนข้อมูล</th>
        <th scope="col">ลบถาวร</th>
    </tr>
    </thead>
    <tbody>
        @foreach($trashDepartments as $row)
        <tr>
        <td>{{$row -> user_id}}</td>
        <td>{{$row -> user ->name}}</td>
        <td>{{$row -> department_name}}</td>
        <td>{{$row -> department_type}}</td>
        <td><a href="{{url('/department/restore/'.$row-> user_id)}}" class = "btn btn-success">กู้คืน</a></td>
        <td><a href="{{url('/department/forcedelete/'.$row-> user_id)}}" class = "btn btn-warning">ลบถาวร</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$trashDepartments -> links()}}
@endif
                </div>
            </div>
            



            <div class="col-md-6">
            <div class ="card">
                    <div class ="card-header">แบบฟอร์มจัดการพนักงาน</div>
                    <div class = "card-body">
                        <form action="{{route('addDepartment')}}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="user_id">IDพนักงาน</label>
                            <input type="text" class="form-control" name="user_id">
                            </div>
        
                            @error('user_id')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร/ห้ามกรอกซํ้า</span>
                            @enderror
                            <br>
                            <div class="form-group">
                            <label for="department_name">ตําแหน่ง</label>
                            <input type="text" class="form-control" name="department_name">
                            </div>

                            @error('department_name')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror


                            <br>
                            <div class="form-group">
                            <label for="department_type">แผนก</label>
                            <input type="text" class="form-control" name="department_type">
                            </div>
                           
                            @error('department_type')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <input type="submit" value="enter" class = "btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </div>
</x-app-layout>