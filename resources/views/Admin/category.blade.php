@extends('admin.master')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>A Fancy Table</h1>
<a href="{{route('category.create')}}" class="btn btn-primary" >Add</a>
<table id="customers">
    <tr>
        <th>Số thứ tự</th>
        <th>Tên danh mục</th>
        <th>Slug</th>
        <th>Action</th>
    </tr>
    @foreach($danhmuc as $key => $value)
    <tr>
        <td>{{$key++}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->slug}}</td>
        <td>
            {{-- <a href="{{route('category.edit',$value)}}" class="btn btn-primary" >Edit</a> --}}
            <a href="{{route('category.edit',$value)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('category.destroy',$value)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</table>

</body>
</html>
@endsection
