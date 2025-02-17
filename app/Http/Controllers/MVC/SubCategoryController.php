<?php

namespace App\Http\Controllers\MVC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // get all categories
            $categories = Category::all();
            //get all SubCategories
            $subCategories = Subcategory::all()->sortBy('category_id');
            return view('admin.categories.subCategories.subCategories', compact('subCategories' , 'categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function create(){
        $categories = Category::all();
        return view('admin.categories.subCategories.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
           
        ]);


        try
        {
            $subCategory = new Subcategory();
            $subCategory->category_id = $request->category_id;
            $subCategory->name = $request->name;
            $subCategory->save();
            return redirect()->route('admin.subCategories')->with('success', 'SubCategory Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.subCategories')->with('error', $th->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $subCategory = Subcategory::find($id);
            $categories = Category::all();
            return view('admin.categories.subCategories.editSubCategories', compact('subCategory' , 'categories'));
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
        $validator = $request->validate( [
            'category_id' => 'exists:categories,id',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            // Find the category by ID
            $subCategory = Subcategory::find($id);

            
            // Update the name
            $subCategory->name = $request->name;

            if ($request->category_id) {
            $subCategory->category_id = $request->category_id;
            }
            // Save the category with updated data
            $subCategory->save();
            return redirect()->route('admin.subCategories')->with('success', 'تم تعديل التصنيف بنجاح');
        } catch (\Throwable $th) {
            return redirect()->route('admin.subCategories')->with('error', $th->getMessage());
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
            $subCategory = Subcategory::find($id);
            $subCategory->delete();
            return redirect()->route('admin.subCategories')->with('success', 'تم حذف التصنيف بنجاح');
        } catch (\Throwable $th) {
            return redirect()->route('admin.subCategories')->with('error', $th->getMessage());
        }
    }
    
    // Get Related SubCategories
    public function getSubcategories($categoryId)
    {
        // Fetch subcategories related to the category ID
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

}
