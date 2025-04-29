<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Blogs;
use App\Models\BlogDetails;

use Carbon\Carbon;

class BlogDetailsController extends Controller
{

    public function index()
    {
        $details = BlogDetails::with('blog')
                ->whereNull('deleted_by')
                ->get();
        
        return view('backend.community.blog-details.index', compact('details'));
    }
    
    public function create(Request $request)
    { 
        $blogs = Blogs::whereNull('deleted_by')->get();
        return view('backend.community.blog-details.create', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'blog_title' => 'required|unique:blog_details,blog_title_id',
            'description' => 'required|string|max:9000',
        ], [
            'product_image.required' => 'The banner image is required.',
            'product_image.image' => 'The banner image must be a valid image file.',
            'product_image.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the banner image.',
            'product_image.max' => 'The banner image size must be less than 2MB.',
            'description.required' => 'The description field is required.',
        ]);

        // Store Banner Image
        if ($request->hasFile('product_image')) {
            $bannerImage = $request->file('product_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->move(public_path('uploads/community/'), $bannerImageName);
        }

        BlogDetails::create([
            'banner_image' => $bannerImageName ?? null,
            'blog_title_id' => $request->blog_title,
            'description' => $request->description,
            'inserted_at' => Carbon::now(),
            'inserted_by' => Auth::id(),
        ]);

        return redirect()->route('blog-detail.index')->with('message', 'Blog details added successfully.');
    }

    public function edit($id)
    {
        $details = BlogDetails::findOrFail($id);
        $blogs = Blogs::whereNull('deleted_by')->get(); 
        return view('backend.community.blog-details.edit', compact('details', 'blogs'));
    }
    


    public function update(Request $request, $id)
    {
        $request->validate([
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',  
            'blog_title' => 'required|exists:blogs,id',
            'description' => 'required|string|max:9000',
        ], [
            'product_image.image' => 'The banner image must be a valid image file.',
            'product_image.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the banner image.',
            'product_image.max' => 'The banner image size must be less than 2MB.',
            'description.required' => 'The description field is required.',
        ]);

        $details = BlogDetails::findOrFail($id);

        // Store Banner Image (Only if a new one is uploaded)
        if ($request->hasFile('product_image')) {
            
            $bannerImage = $request->file('product_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->move(public_path('uploads/community/'), $bannerImageName);
        } else {
            $bannerImageName = $details->banner_image;
        }

        $details->update([
            'banner_image' => $bannerImageName,
            'blog_title_id' => $request->blog_title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('blog-detail.index')->with('message', 'Blog details updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::id();
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = BlogDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('blog-detail.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}