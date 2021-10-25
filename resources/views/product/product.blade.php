<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สินค้า
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-6">
                <div class ="card">
                    <div class ="card-header">ตารางสินค้า</div>
                    <table class="table table-dark table-striped">
                        <thead>
    <tr>
    <th scope="col">หมายเลขสินค้า</th>
        <th scope="col">ชื่อสินค้า</th>
        <th scope="col">ผู้จัดจําหน่าย</th>
        <th scope="col">อัตราส่วนขนาด</th>
        <th scope="col">แก้ไขข้อมูล</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $row)
    <tr>
    <td>{{$row -> id}}</td>
        <td>{{$row -> product_name}}</td>
        <td>{{$row -> product_vendor}}</td>
        <td>{{$row -> scale}}</td>
        <td><a href="{{url('/product/edit/'.$row-> id)}}" class = "btn btn-primary">แก้ไข</a></td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$products -> links()}}

                </div>
            </div>
            <div class="col-md-6">
            <div class ="card">
                    <div class ="card-header">แบบฟอร์ม</div>
                    <div class = "card-body">
                        <form action="{{route('addProduct')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" name="product_name">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('product_name')
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