<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            userทั้งหมด
        </h2>
    </x-slot>
    <div class="py-12">
        <div class = "container">
        <div class = "row">
        <table class="table table-info table-striped">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">อีเมล</th>
        <th scope="col">บทบาท</th>
        <th scope="col">memberpoint</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $row)
    <tr>
        <td>{{$row -> id}}</td>
        <td>{{$row -> name}}</td>
        <td>{{$row -> email}}</td>
        <td>{{$row -> role}}</td>
        <td>{{$row -> memberpoint}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>
        </div>
    </div>
</x-app-layout>