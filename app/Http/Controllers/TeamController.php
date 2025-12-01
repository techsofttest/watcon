<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;
use App\Models\TeamCategory;
use App\Models\TeamMember;

class TeamController extends Controller
{

    public function index()
    {

    $data['seo'] = SeoMeta::find(2);

    $data['categories'] = TeamCategory::orderBy('name','desc')->get();

    $data['team_members'] = TeamMember::orderBy('order','asc')->get()->groupBy('team_category_id');

    return view('pages.team',$data);

    }


}
