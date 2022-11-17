<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Faker\Provider\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $data = Category::query()->where('name','like','%'. $search.'%')->get();

        return view('admin.category', [
            'data'=>$data,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responses
     */
    public function store(Request $request, $id)
    {
        // dd($request);
        // dd($category);
        $request->validate([
            'name' => 'required' . $id,
            'image' => 'image|mimes:png,jpg,jpeg',
        ], [
            'name.required' => 'Ten ko dk de trong',
            'image.image' => 'Anh ko dk de trong',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        // $category->save();
        // return redirect()->route('category.index');

        if (($request)->hasFile('image')) {
            //Get file
            $file = $request->file('image');
            //GEt ten file
            $filename = time() . '_' . $file->getClientOriginalName();
            //Duong dan upload file
            $path_upload = 'storage/category/';
            // dd($path_upload);
            // $request->$file('image')->move($path_upload, $filename);
            // $category->image = $path_upload . $filename;

            Storage::move($path_upload, $filename);
            $category->image = $path_upload . $filename;
            // dd($category);
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('admin.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except(['_token', '_method']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // dd($category);
        // Category::destroy($category);
        $category->delete();
        return redirect()->route('category.index');
    }
}
