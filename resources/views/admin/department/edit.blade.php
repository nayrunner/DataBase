<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            การจัดการทรัพยากรพนักงาน
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-8">
                 <div class ="card-header">แบบฟอร์มแก้ไขแผนกของพนักงาน(ที่มีid = {{$department->id}})</div>
                    <div class = "card-body">
                        <form action="{{url('/department/update/'.$department->user_id)}}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="department_name">แผนก</label>
                            <input type="text" class="form-control" name="department_name" value="{{$department->department_name}}">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('department_name')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br>
                            <input type="submit" value="update" class = "btn btn-primary">
                        </form>
                    </div>
                </div>


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>