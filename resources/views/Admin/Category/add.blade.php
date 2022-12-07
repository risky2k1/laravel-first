@extends('Admin.master')

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

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

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

<!-- /resources/views/post/create.blade.php -->
<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
<form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
    @csrf
    <table id="customers">
        <tr>
            <th>Số thứ tự</th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Danh mục cha</th>
            <th>Action</th>
        </tr>

        <tr>
            <td>
                {{-- <input type="text"> --}}
            </td>
            <td><input type="text" name="name" value="{{old('name')}}">Tên</td>
            <td><input type="text" name="slug">Slug</td>
            <td><input type="file" name="image">Image</td>
            <td>

                <select name="parent_id" style="width: 200px ">
                    @foreach($data as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </td>

            <td>

                <button type="submit" class="btn btn-primary">Execute</button>
            </td>

        </tr>

    </table>
    {{--    {{dd($data)}}--}}
</form>
</body>
</html>
@endsection
