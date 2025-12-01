<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Models\Content;

class JobController extends Controller
{

    public function index()
    {

    $data['seo'] = SeoMeta::find(5);

    $data['jobs'] = Content::find(3);

    return view('pages.jobs',$data);

    }

}
