@extends('admin.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/rg-1.3.0/sc-2.0.7/sb-1.4.0/sl-1.5.0/datatables.min.css"/>
@endpush
    @section('content')
    <!DOCTYPE html>
<html lang="en">
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
    <title></title>
</head>
<body>

<h1>A Fancy Table</h1>
<a href="{{route('product.create')}}" class="btn btn-primary">Add</a>
<caption>
    <form>
        Search
        <label>
            <input type="text" name="search" placeholder="Search" value="{{$search}}">
        </label>

    </form>
</caption>
<table id="customers">
    <tr>
        <th>Số thứ tự</th>
        <th>Tên danh mục</th>
        <th>Loại danh mục</th>
        <th>Action</th>
    </tr>
    @foreach($dataP as $key => $value)
        {{--        {{dd($data)}}--}}
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->name}}</td>
            <td>
                {{$value->CategoryName}}
            </td>
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
{{$dataP->links()}}

</body>
</html>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/rg-1.3.0/sc-2.0.7/sb-1.4.0/sl-1.5.0/datatables.min.js"></script>
@endpush
