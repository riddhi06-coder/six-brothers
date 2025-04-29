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
use App\Models\CocktailDetails;

use Carbon\Carbon;

class CocktailsDetailsController extends Controller
{

    public function index()
    {    
        $details = CocktailDetails::with('blog')
                    ->whereNull('deleted_by')
                    ->get();

        return view('backend.cocktail.details.index', compact('details'));
    }
    
    public function create(Request $request)
    { 
        $blogs = Cocktails::whereNull('deleted_by')->get();
        return view('backend.cocktail.details.create', compact('blogs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cocktail_title' => 'required|unique:cocktail_details,blog_title_id',
            'ingredients'   => 'required|string',
            'method'        => 'required|string',
            'description'   => 'nullable|string|max:9000',
        ], [
            'product_image.required' => 'The banner image is required.',
            'product_image.image' => 'The banner image must be a valid image file.',
            'product_image.mimes' => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the banner image.',
            'product_image.max' => 'The banner image size must be less than 2MB.',
            'ingredients.required' => 'The description field is required.',
            'method.required' => 'The description field is required.',
        ]);

        // Store Banner Image
        if ($request->hasFile('product_image')) {
            $bannerImage = $request->file('product_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->move(public_path('uploads/community/'), $bannerImageName);
        }

        CocktailDetails::create([
            'banner_image' => $bannerImageName ?? null,
            'blog_title_id' => $request->cocktail_title,
            'ingredients'   => $request->ingredients,
            'method'        => $request->method,
            'description' => $request->description,
            'inserted_at' => Carbon::now(),
            'inserted_by' => Auth::id(),
        ]);

        return redirect()->route('cocktail-detail.index')->with('message', 'Details added successfully.');
    }
}