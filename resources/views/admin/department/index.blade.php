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
                    <div class ="card-header">ตารางแผนก</div>
                    <table class="table table-dark table-striped">
                        <thead>
                    <tr>
        <th scope="col">id</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">แผนก</th>
    </tr>
    </thead>
    <tbody>
        @foreach($departments as $row)
        <tr>
        <td>{{$row -> user_id}}</td>
        <td>{{$row -> user ->name}}</td>
        <td>{{$row -> department_name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$departments -> links()}}
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
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('id')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน10อักษร/ห้ามกรอกซํ้า</span>
                            @enderror
                            <br>
                            <div class="form-group">
                            <label for="department_name">แผนก</label>
                            <input type="text" class="form-control" name="department_name">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('department_name')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน10อักษร/ห้ามกรอกซํ้า</span>
                            @enderror
                            <br>
                            <input type="submit" value="enter" class = "btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </div>
</x-app-layout>