<?php

namespace App\Http\Controllers\MVC;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        $category = new Category();     

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image');
          
        }

        $category->save();  

        return redirect()->route('admin.categories')->with('success', 'تم اضافة التصنيف بنجاح');    
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = Category::find($id);
            return view('admin.categories.editCategory', compact('category'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([    
            'name' => 'required',   
            'image' => 'nullable|image',
        ]);

        try {
            $category = Category::find($id);

            $category->name = $request->name;

            if ($request->hasFile('image')) {
                $category->image = $request->file('image');
            }
            $category->save();

            return redirect()->route('admin.categories')->with('success', 'تم تعديل التصنيف بنجاح');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);

            $category->delete();
        
            return redirect()->route('admin.categories')->with('success', 'تم حذف التصنيف بنجاح');  
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage()); 
        }
    }
}
