<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            การจัดการโปรโมชั่น
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-8">
                 <div class ="card-header">แบบฟอร์มแก้ไขโปรโมชั่น</div>
                    <div class = "card-body">
                        <form action="{{url('/promotion/update/'.$promotions->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="code">code</label>
                            <input type="text" class="form-control" name="code" value="{{$promotions->code}}">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('code')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร/ห้ามกรอกซํ้า</span>
                            @enderror
                            <br>
                            <label for="discount">discount</label>
                            <input type="text" class="form-control" name="discount" value="{{$promotions->discount}}">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('discount')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br>
                            <label for="amount">amount</label>
                            <input type="text" class="form-control" name="amount" value="{{$promotions->amount}}">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('amount')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br>
                            <label for="expired_date">expired_date</label>
                            <input type="text" class="form-control" name="expired_date" value="{{$promotions->expired_date}}">
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('expired_date')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br>
                            <input type="submit" value="update" class = "btn btn-primary">
                        </div>
                        </form>
                    </div>
                </div>


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>