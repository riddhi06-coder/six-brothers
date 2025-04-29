<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Cocktails;

use Carbon\Carbon;

class CocktailsController extends Controller
{

    public function index()
    {
        $details = Cocktails::whereNull('deleted_by')->get();
        return view('backend.cocktail.list.index', compact('details'));
    }
    

    public function create(Request $request)
    { 
        return view('backend.cocktail.list.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'blog_heading' => 'required|string|max:255',
            'description' => 'nullable|string|max:9000',
        ], [
        ], [
            'thumbnail.required' => 'The thumbnail image is required.',
            'thumbnail.image' => 'The thumbnail must be a valid image file.',
            'thumbnail.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the thumbnail.',
            'thumbnail.max' => 'The thumbnail size must be less than 2MB.',
            'blog_heading.required' => 'The blog heading field is required.',
        ]);
    
        // Upload Thumbnail
        $thumbnailName = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . rand(10, 999) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/cocktail/'), $thumbnailName);
        }
    
        $slug = Str::slug($request->blog_heading, '-');
    
        Cocktails::create([
            'thumbnail' => $thumbnailName,
            'blog_heading' => $request->blog_heading,
            'description' => $request->description,
            'slug' => $slug,
            'inserted_at' => Carbon::now(),
            'inserted_by' => Auth::id(),
        ]);
    
        return redirect()->route('cocktails.index')->with('message', 'Details created successfully.');
    }


}