<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Models\Blog;

class EventController extends Controller
{

    public function index()
    {

    $data['seo'] = SeoMeta::find(11);

    $data['blogs'] = Blog::where('category_id',2)->orderBy('id','desc')->get();

    $data['title'] = "Events and News";

    return view('pages.blogs',$data);

    }


    public function detail($slug)
    {

    $data['blog'] = Blog::where('slug',$slug)->first();
    return view('pages.blog-detail',$data);

    }


}
