<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\CommunityPressRelease;

use Carbon\Carbon;

class PressController extends Controller
{

    public function index()
    {
        $details = CommunityPressRelease::whereNull('deleted_by')->get();
        return view('backend.community.press.index', compact('details'));
    }

    
    public function create(Request $request)
    { 
        return view('backend.community.press.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'banner_heading' => 'nullable|string|max:255',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'blog_heading' => 'required|string|max:255',
            'url' => 'required|url',
        ], [
            'thumbnail.required' => 'The thumbnail image is required.',
            'thumbnail.image' => 'The thumbnail must be a valid image file.',
            'thumbnail.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the thumbnail.',
            'thumbnail.max' => 'The thumbnail size must be less than 2MB.',
            'blog_heading.required' => 'The blog heading field is required.',
            'url.required' => 'The URL field is required.',
            'url.url' => 'The URL must be a valid URL.',
        ]);
    
        // Upload Thumbnail
        $thumbnailName = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . rand(10, 999) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/community/'), $thumbnailName);
        }
    
        $slug = Str::slug($request->blog_heading, '-');
    
        CommunityPressRelease::create([
            'banner_heading' => $request->banner_heading,
            'thumbnail' => $thumbnailName,
            'blog_heading' => $request->blog_heading,
            'url' => $request->url,
            'slug' => $slug,
            'inserted_at' => Carbon::now(),
            'inserted_by' => Auth::id(),
        ]);
    
        return redirect()->route('community-press-releases.index')->with('message', 'Press release created successfully.');
    }

    
    public function edit($id)
    {
        $details = CommunityPressRelease::findOrFail($id);
        return view('backend.community.press.edit', compact('details'));
    }


    public function update(Request $request, $id)
    {
        $pressRelease = CommunityPressRelease::findOrFail($id);

        $request->validate([
            'banner_heading' => 'nullable|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'blog_heading' => 'required|string|max:255',
            'url' => 'required|url',
        ], [
            'banner_image.image' => 'The banner image must be a valid image file.',
            'banner_image.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the banner image.',
            'banner_image.max' => 'The banner image size must be less than 2MB.',
            
            'thumbnail.image' => 'The thumbnail must be a valid image file.',
            'thumbnail.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the thumbnail.',
            'thumbnail.max' => 'The thumbnail size must be less than 2MB.',

            'blog_heading.required' => 'The blog heading field is required.',
            'url.required' => 'The URL field is required.',
            'url.url' => 'The URL must be a valid URL.',
        ]);

        // Upload and replace banner image
        if ($request->hasFile('banner_image')) {

            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . rand(100, 999) . '_banner.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->move(public_path('uploads/community/'), $bannerImageName);
            $pressRelease->banner_image = $bannerImageName;
        }

        // Upload and replace thumbnail image
        if ($request->hasFile('thumbnail')) {
           
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . rand(100, 999) . '_thumb.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/community/'), $thumbnailName);
            $pressRelease->thumbnail = $thumbnailName;
        }

        // Update other fields
        $pressRelease->banner_heading = $request->banner_heading;
        $pressRelease->blog_heading = $request->blog_heading;
        $pressRelease->url = $request->url;
        $pressRelease->slug = Str::slug($request->blog_heading, '-');
        $pressRelease->modified_at = Carbon::now();
        $pressRelease->modified_by = Auth::id();
        $pressRelease->save();

        return redirect()->route('community-press-releases.index')->with('message', 'Press release updated successfully.');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::id();
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = CommunityPressRelease::findOrFail($id);
            $industries->update($data);

            return redirect()->route('community-press-releases.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}