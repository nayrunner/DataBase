<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ออเดอร์
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-6">
                 <div class ="card-header">แบบฟอร์มยืนยันการชําระเงิน</div>
                    <div class = "card-body">
                        <form action="{{url('/ordercus/update/'.$orders->id  .Auth::user()->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="payment">หลักฐานการชําระเงิน</label>
                            <input type="text" class="form-control" name="payment" value="{{$orders->payment}}">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('payment')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror

                            <br>
                            <label for="require_date">วันที่ต้องการให้จัดส่ง</label>
                            <input type="text" class="form-control" name="require_date" value="วันที่/เดือน/ปี">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('require_date')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror

                            <br>
                            <label for="promotioncode">โปรโมชั่นที่ต้องการ</label>
                            <input type="text" class="form-control" name="promotioncode" value=" ">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('promotioncode')
                            <span class="text-danger">ห้ามเกิน50อักษร</span>
                            @enderror

                            <br>
                            <input type="submit" value="update" class = "btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

                <br>
                <div class="col-md-6">
                <div class ="card">
                    <div class ="card-header">โปรโมชั่นที่ใช้ได้</div>
                    <table class="table table-dark table-striped">
                        <thead>
    <tr>
    <th scope="col">code</th>
        <th scope="col">discount</th>
    </tr>
    </thead>
    <tbody>
        @foreach($promotions as $row)
        @if($row -> amount > 0)
    <tr>
        <td>{{$row -> code}}</td>
        <td>{{$row -> discount}}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

                </div>
            </div>

</x-app-layout>