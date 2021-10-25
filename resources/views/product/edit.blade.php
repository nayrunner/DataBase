<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            การจัดการสินค้า
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
            <div class="col-md-8">
                 <div class ="card-header">แบบฟอร์มแก้ไขสินค้า(ที่มีid = {{$products->id}})</div>
                    <div class = "card-body">
                        <form action="{{url('/product/update/'.$products->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('product_name')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br>
                            <label for="product_vendor">ผู้จัดจําหน่าย</label>
                            <input type="text" class="form-control" name="product_vendor" value="{{$products->product_vendor}}">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('product_vendor')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br>
                            <label for="scale">อัตราส่วนขนาด</label>
                            <input type="text" class="form-control" name="scale" value="{{$products->scale}}">
                            </div>
                            @if(session("success"))
                            <span class ="alert ">{{session('success')}}</span>
                            @endif
                            @error('scale')
                            <span class="text-danger">ต้องกรอกช่องนี้/ห้ามเกิน50อักษร</span>
                            @enderror
                            <br><br>
                            <input type="submit" value="update" class = "btn btn-primary">
                        </form>
                    </div>
                </div>


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>