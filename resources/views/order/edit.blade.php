<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ออเดอร์
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-8">
                 <div class ="card-header">แบบฟอร์มแก้ไขออเดอร์(ที่มีid = {{$orders->id}})</div>
                    <div class = "card-body">
                        <form action="{{url('/order/update/'.$orders->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="shipped_date">วันที่จัดส่ง</label>
                            <input type="text" class="form-control" name="shipped_date" value="{{$orders->shipped_date}}">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('department_name')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror


                            <label for="comment">คอมเมนต์</label>
                            <input type="text" class="form-control" name="comment" value="{{$orders->comment}}">
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