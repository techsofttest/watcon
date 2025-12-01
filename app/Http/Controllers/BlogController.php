<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Models\Blog;

class BlogController extends Controller
{
    
    public function index()
    {

    $data['seo'] = SeoMeta::find(8);

    $data['blogs'] = Blog::where('category_id',1)->get();

    $data['title'] = "Blogs/Media";

    return view('pages.blogs',$data);

    }


    public function detail($slug)
    {

    $data['blog'] = Blog::where('slug',$slug)->first();
    return view('pages.blog-detail',$data);

    }





}
