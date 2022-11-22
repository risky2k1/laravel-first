<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Faker\Provider\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Application|Factory|View
    {
        $search = $request->get('search');

//        $data = Category::query()
//            ->where('name','like','%'. $search.'%')
//            ->paginate(20);
//        //Truyền thêm search khi phân trang
//        $data->appends(['search'=>$search]);

        $data = Category::where('name','like','%'. $search.'%')
            ->paginate();

//        $data->parent_id = $request->parent_id;


//        dd($data);
        return view('admin.category', [
            'data'=>$data,
            'search' => $search,

        ]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $data = Category::all();
        return view('admin.add',[
            'data'=>$data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        // dd($request);
        // dd($category);
//        $request->validate([
//            'name' => 'required' . $id,
//            'image' => 'image|mimes:png,jpg,jpeg',
//        ], [
//            'name.required' => 'Ten ko dk de trong',
//            'image.image' => 'Anh ko dk de trong',
//        ]);

//        $category = new Category();
//        $category->name = $request->name;
//        $category->slug = $request->slug;
        // $category->save();
        // return redirect()->route('category.index');

        $category = Category::create($request->validated());

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
//        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Category $category): Factory|View|Application
    {
        // dd($category);
        return view('admin.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
//        $category->update($request->except(['_token', '_method']));

        $category->fill($request->except(['_token', '_method']));
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        // dd($category);
        // Category::destroy($category);
        $category->delete();
        return redirect()->route('category.index');
    }
}
