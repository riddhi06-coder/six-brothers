<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\CommunityBanner;

use Carbon\Carbon;

class BannerDetailsController extends Controller
{

    public function index()
    {
        $banners = CommunityBanner::whereNull('deleted_by')->get();
        return view('backend.community.banner.index', compact('banners'));
    }

    public function create(Request $request)
    { 
        return view('backend.community.banner.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'banner_heading' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ], [
            'banner_heading.required' => 'The banner heading is required.',
            'banner_image.required' => 'Please upload a banner image.',
            'banner_image.image' => 'The uploaded file must be an image.',
            'banner_image.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed.',
            'banner_image.max' => 'The image must be less than 2MB.',
        ]);
    
        $banner = new CommunityBanner();
        $banner->banner_heading = $request->banner_heading;
        $banner->inserted_at = Carbon::now();
        $banner->inserted_by = Auth::id();
    
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image'); 
        
            if ($image->isValid()) {
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
        
                $destinationPath = public_path('/uploads/community');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $image->move($destinationPath, $new_name);

                $banner->banner_image = $new_name;
            }
        }
        
        $banner->save();
    
        return redirect()->route('community-banner-details.index')->with('message', 'Banner created successfully!');
    }

    public function edit($id)
    {
        $HomeBanner = CommunityBanner::findOrFail($id);
        return view('backend.community.banner.edit', compact('HomeBanner'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_heading' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ], [
            'banner_heading.required' => 'The banner heading is required.',
            'banner_image.image' => 'The uploaded file must be an image.',
            'banner_image.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed.',
            'banner_image.max' => 'The image must be less than 2MB.',
        ]);
    
        $banner = CommunityBanner::findOrFail($id);
    
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
    
            if ($image->isValid()) {
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
    
                $destinationPath = public_path('/uploads/community');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
    
                $image->move($destinationPath, $new_name);
                $banner->banner_image = $new_name; 
            }
        }

        $banner->banner_heading = $request->banner_heading;
        $banner->modified_at = Carbon::now(); 
        $banner->modified_by = Auth::id(); 
    
        $banner->save();
    
        return redirect()->route('community-banner-details.index')->with('message', 'Banner updated successfully!');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CommunityBanner::findOrFail($id);
            $industries->update($data);

            return redirect()->route('community-banner-details.index')->with('message', 'Banner deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}