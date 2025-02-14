<?php

namespace App\Http\Controllers\MVC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch all subcategories to populate the dropdown
        $subcategories = Subcategory::all();

        // Pass the subcategories to the view
        return view('admin.products.create', compact('subcategories'));
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        // Create the product
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'subcategory_id' => $request->subcategory_id,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.products')->with('success', 'تم إنشاء المنتج بنجاح.');
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
         // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Fetch all subcategories for the dropdown
        $subcategories = Subcategory::all();

        // Pass the product and subcategories to the view
        return view('admin.products.edit', compact('product', 'subcategories'));
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
            // Validate the incoming request data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'subcategory_id' => 'required|exists:subcategories,id',
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update the product with the new data
    $product->update([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'subcategory_id' => $request->subcategory_id,
    ]);

    // Redirect back with a success message
    return redirect()->route('admin.products')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        // Delete the product
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'تم حذف المنتج بنجاح.');
    }
}
