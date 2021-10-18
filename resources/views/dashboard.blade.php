<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ยินดีต้อนรับ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
        <div class = "row">
        <table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">ลําดับ</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">อีเมล</th>
        <th scope="col">ตําแหน่ง</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $row)
    <tr>
        <th scope="row">1</th>
        <td>{{$row -> name}}</td>
        <td>{{$row -> email}}</td>
        <td>{{$row -> role}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>
        </div>
    </div>
</x-app-layout>
