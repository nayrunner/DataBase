<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สินค้าพรีออร์เดอร์
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-12">
                <div class ="card">
                <div class = "card-header">คุณมีmemberpointทั้งหมด : {{Auth::user()->memberpoint}}</div>
                    <div class ="card-header">สินค้าพรีออร์เดอร์ทั้งหมด</div>
                    @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                    <table class="table table-primary table-striped">
                        <thead>
                    <tr>
        <th scope="col">หมายเลขสินค้า</th>
        <th scope="col">ชื่อสินค้า</th>
        <th scope="col">ผู้จัดจําหน่าย</th>
        <th scope="col">อัตราส่วนขนาด</th>
        <th scope="col">ราคาเต็ม</th>
        <th scope="col">ราคาพรีออร์เดอร์</th>
        <th scope="col">ซื้อ</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $row)
        @if($row -> remain_in_stock == 0)
        <tr>
        <td>{{$row -> id}}</td>
        <td>{{$row -> product_name}}</td>
        <td>{{$row -> product_vendor}}</td>
        <td>{{$row -> scale}}</td>
        <td>{{$row -> price}}</td>
        <td>{{$row -> price /2 }}</td>
        <td><a href="{{url('/preorder/purchase/' .$row-> id  .Auth::user()->id)}}" class = "btn btn-success">พรีออเดอร์</a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

                    
                    </div>
                </div>
            </div>


        </div>
        </div>
    </div>
</x-app-layout>