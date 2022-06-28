<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {

        $banner = Banner::latest()->paginate(5);
        return view('banner.index', compact('banner'))
        ->with('i', (request()->input('page', 1) - 1) * 8);

    }





    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|unique:banners,title',
            'description'=>'required',
            'banner_image' =>'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $input = $request->all();
  
        if ($image = $request->file('banner_image')) {
            $destinationPath = 'banners/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['banner_image'] = "$profileImage";
        }


        Banner::create($input);
        return redirect()->route('banner.index')
         ->with('success', 'banner created successfully.');
    }


    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([

            'title' => 'required',
            'description'=>'required',
        ]);

        $input = $request->all();
  
        if ($image = $request->file('banner_image')) {

            $destinationPath = 'banners/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['banner_image'] = "$profileImage";

        }else{

            unset($input['banner_image']);
        }

        $banner->update($input);

        return redirect()->route('banner.index')

            ->with('success', 'banner updated successfully');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')
            ->with('success', 'banner deleted successfully');
    }

    
}
