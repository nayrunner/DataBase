<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ออเดอร์
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-12">
                <div class ="card">
                    <div class ="card-header">รายละเอียดออเดอร์</div>
                   

                    <table class="table table-primary table-striped">
                        <thead>
                    <tr>
        <th scope="col">หมายเลขคําสั่งซื้อ</th>
        <th scope="col">หมายเลขลูกค้า</th>
        <th scope="col">การชําระเงิน</th>
        <th scope="col">ราคา</th>
        <th scope="col">สถานะ</th>
        <th scope="col">วันที่ต้องการ</th>
        <th scope="col">วันที่จัดส่ง</th>
        <th scope="col">คอมเมนต์</th>
        <th scope="col">แก้ไข</th>
    </tr>
    </thead>
    <tbody>
        @foreach($orders as $row)
        <tr>
        <td>{{$row -> id}}</td>
        <td>{{$row -> customer_id}}</td>
        <td>{{$row -> payment}}</td>
        <td>{{$row -> price}}</td>
        <td>{{$row -> status}}</td>
        <td>{{$row -> require_date}}</td>
        <td>{{$row -> shipped_date}}</td>
        <td>{{$row -> comment}}</td>
        <td><a href="{{url('/order/edit/'.$row-> id)}}" class = "btn btn-primary">แก้ไข</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$orders -> links()}}




                </div>       
            </div>
        </div>
        </div>
    </div>
</x-app-layout>