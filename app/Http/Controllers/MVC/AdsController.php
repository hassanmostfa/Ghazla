<?php

namespace App\Http\Controllers\MVC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
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
            'link' => 'nullable',
            'image' => 'nullable',
        ]);

        // Create the ad
        $ad = new Ad();
        $ad->title = $request->title;
        $ad->link = $request->link;
        $ad->image = $request->file('image'); // This will trigger the setImageAttribute mutator
        $ad->save();

        // Redirect back with a success message
        return redirect()->route('admin.ads')->with('success', 'تم إنشاء الإعلان بنجاح.');
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
        // Fetch the ad by ID
        $ad = Ad::findOrFail($id);

        // Pass the ad to the view
        return view('admin.ads.edit', compact('ad'));
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
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the ad by ID
        $ad = Ad::findOrFail($id);

        // Update the ad
        $ad->title = $request->title;
        $ad->link = $request->link;

        // Update the image if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($ad->image && file_exists(public_path('assets/images/ads/' . $ad->image))) {
                unlink(public_path('assets/images/ads/' . $ad->image));
            }

            // Save the new image
            $ad->image = $request->file('image'); // This will trigger the setImageAttribute mutator
        }

        $ad->save();

        // Redirect back with a success message
        return redirect()->route('admin.ads')->with('success', 'تم تحديث الإعلان بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();
        
        return redirect()->route('admin.ads')->with('success', 'تم حذف الإعلان بنجاح.');
        
        
    }
}
