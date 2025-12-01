<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;


class HomeController extends Controller
{
    
    public function index()
    {

    $data['seo'] = SeoMeta::find(1);

    return view('pages.index',$data);

    }

}
