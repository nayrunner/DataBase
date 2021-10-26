<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            จัดการโปรโมชั่น
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-6">
                <div class ="card">
                    <div class ="card-header">ตารางโปรโมชั่น</div>
                    <table class="table table-dark table-striped">
                        <thead>
    <tr>
    <th scope="col">promotion code</th>
        <th scope="col">discount</th>
        <th scope="col">amount</th>
        <th scope="col">expired_date</th>
        <th scope="col">edit</th>
    </tr>
    </thead>
    <tbody>
        @foreach($promotions as $row)
    <tr>
        <td>{{$row -> code}}</td>
        <td>{{$row -> discount}}</td>
        <td>{{$row -> amount}}</td>
        <td>{{$row -> expired_date}}</td>
        <td><a href="{{url('/promotion/edit/'.$row-> id)}}" class = "btn btn-primary">แก้ไข</a></td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
            </div>

<div class="col-md-6">
            <div class ="card">
                    <div class ="card-header">แบบฟอร์ม</div>
                    <div class = "card-body">
                        <form action="{{route('addPromotion')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="code">code</label>
                            <input type="text" class="form-control" name="code">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('code')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน10อักษร/ห้ามกรอกซํ้า</span>
                            @enderror
                            <br>

                            @csrf
                            <div class="form-group">
                            <label for="discount">discount</label>
                            <input type="text" class="form-control" name="discount">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('discount')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน10อักษร</span>
                            @enderror
                            <br>

                            @csrf
                            <div class="form-group">
                            <label for="amount">amount</label>
                            <input type="text" class="form-control" name="amount">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('amount')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน10อักษร</span>
                            @enderror
                            <br>

                            @csrf
                            <div class="form-group">
                            <label for="expired_date">expired_date</label>
                            <input type="text" class="form-control" name="expired_date">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('expired_date')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน10อักษร</span>
                            @enderror
                            <br>

                            <input type="submit" value="enter" class = "btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</x-app-layout>