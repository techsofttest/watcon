<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Models\Partner;
use App\Models\Content;

class SummaryController extends Controller
{
    
    public function index()
    {

    $data['seo'] = SeoMeta::find(2);

    $data['summary'] = Content::find(2);

    $data['partners'] = Partner::orderBy('order','asc')->get();

    return view('pages.summary',$data);

    }

}
