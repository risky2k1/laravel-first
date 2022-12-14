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

<h1>A Fancy Table</h1>
<a href="{{route('category.create')}}" class="btn btn-primary">Add</a>
<caption>
    <form>
        Search
                <input type="text" name="search" placeholder="Search" value="{{$search}}">

    </form>
</caption>
<table id="customers">
    <tr>
        <th>Số thứ tự</th>
        <th>Tên danh mục</th>
        <th>Loại danh mục</th>
        <th>Action</th>
    </tr>
    @foreach($data as $key => $value)
        {{--        {{dd($data)}}--}}
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->name}}</td>
            <td> {{$value->parent_id ? @$value->parent->name : 'danh muc cha'}}</td>
            <td>
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
{{$data->links()}}

</body>
</html>
@endsection
