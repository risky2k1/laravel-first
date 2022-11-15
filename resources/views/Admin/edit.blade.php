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
<form method="post" action="{{route('category.update',$category)}}">
    @csrf
    @method('PUT')
<table id="customers">
    <tr>
        <th>Số thứ tự</th>
        <th>Tên danh mục</th>
        <th>Slug</th>
        <th>Action</th>
    </tr>

    <tr>
        <td>
        {{-- <input type="text"> --}}
        </td>
        <td><input type="text" name="name" value="{{$category->name}}">Tên </td>
        <td><input type="text" name="slug" value="{{$category->slug}}">Slug</td>
       
        <td>
            
            <button type="submit" class="btn btn-primary">Execute</button>
        </td>

    </tr>

</table>
</form>
</body>
</html>
@endsection
