<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\CommunityBanner;
use App\Models\CommunityPressRelease;
use App\Models\Blogs;
use App\Models\BlogDetails;
use App\Models\CocktailDetails;
use App\Models\Cocktails;

use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        $banner = CommunityBanner::orderBy('inserted_at', 'desc')->wherenull('deleted_by')->first();
        $pressReleases = CommunityPressRelease::wherenull('deleted_by')->get();
        $blogs = Blogs::wherenull('deleted_by')->get();
        return view('frontend.community', compact('banner','pressReleases','blogs'));
    }
    

    public function blog_details($slug)
    {
        $blogType = Blogs::where('slug', $slug)->whereNull('deleted_by')->firstOrFail();
    
        $blogs = BlogDetails::with('blog')  
            ->where('blog_title_id', $blogType->id) 
            ->whereNull('deleted_by') 
            ->orderBy('inserted_at', 'asc') 
            ->get();
        // dd($blogs);
    
        $blog_head = BlogDetails::whereNull('deleted_by')->orderBy('inserted_at', 'asc')->get();

        $blogs_articles = Blogs::wherenull('deleted_by')->get();
    
        return view('frontend.blog-details', compact('blogs', 'blog_head','blogs_articles'));
    }
    

    public function show($slug)
    {
        $cocktail = Cocktails::where('slug', $slug)->firstOrFail();
        $details = CocktailDetails::where('blog_title_id', $cocktail->id)->first();

        // dd($details);
    
        return view('frontend.cocktail-details', compact('cocktail', 'details'));
    }
    


    
}