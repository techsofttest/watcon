<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Models\WorkPackage;

class WorkPackageController extends Controller
{
    
    public function index()
    {

    $data['seo'] = SeoMeta::find(9);

    $data['packages'] = WorkPackage::orderBy('order','asc')->get();

    return view('pages.work-packages',$data);

    }


}
