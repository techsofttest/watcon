<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;

use App\Models\Publication;

class PublicationController extends Controller
{

    public function books()
    {

    $data['seo'] = SeoMeta::find(6);

    $data['title'] = "Our Books";

    $data['publications'] = Publication::where('category_id',1)->get();

    return view('pages.books',$data);

    }


     public function articles()
    {

    $data['seo'] = SeoMeta::find(7);

    $data['title'] = "Articles and Book Chapters";

    $data['publications'] = Publication::where('category_id',2)->get();

    return view('pages.books',$data);

    }




    public function detail($slug)
    {


    $data['publication'] = Publication::where('slug',$slug)->first();

    return view('pages.book-detail',$data);
    

    }


}
