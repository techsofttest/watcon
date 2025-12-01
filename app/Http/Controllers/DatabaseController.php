<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;

use App\Models\CaseLaw;
use App\Models\LegalInstrument;
use App\Models\CaseLawCategory;
use App\Models\State;

use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
   
    public function index()
    {

    $data['seo'] = SeoMeta::find(10);

    $data['categories'] = CaseLawCategory::orderBy('name','asc')->get();

    $data['states'] = State::where('name', '!=', 'Inter-State')->orderBy('name','asc')->get();

    $data['categories'] = CaseLawCategory::orderBy('name','asc')->get();

    return view('pages.database',$data);

    }



       public function search(Request $request)
    {

        $data['seo'] = SeoMeta::find(10);

        // Get search query from URL (?q=...)
        $query = $request->input('q');
       

        // Search in CaseLaw titles
        $data['cl'] = CaseLaw::where('parties', 'like', "%{$query}%")->get();

        // Search in LegalInstrument titles
        $data['li'] = LegalInstrument::where('title', 'like', "%{$query}%")->get();

        
        return view('pages.database-search',$data);

    }




  public function loadMoreDocuments(Request $request)
{
    $page = $request->page ?? 1;
    $perPage = 10;

    $from = $request->from_year;
    $to = $request->to_year;
    $types = $request->types ?? [];
    $categories = $request->categories ?? [];
    $countrytypes = $request->countrytypes ?? [];
    $states = $request->states ?? [];
    $countries = $request->countries ?? [];
    $highcourts = $request->highcourts ?? [];
    $courttypes = $request->courttypes ?? [];
    $parties = $request->parties ?? [];
    $ngtfilter = $request->ngtfilter ?? [];
    

    // Case Laws Query
    $caseLaws = CaseLaw::select(
        'id',
        DB::raw("parties AS title"),
        'year',
        'headnote',
        DB::raw("'case_law' AS type"),
        'court',
        'case_no',
        'date_of_judgement'
    );

    if ($from) $caseLaws->where('year', '>=', $from);
    if ($to)   $caseLaws->where('year', '<=', $to);



    if (!empty($countries) && !in_array('india', $countries)) {
            $caseLaws->whereRaw('1 = 0'); // exclude all case laws
    }



     if (!empty($types) && !in_array('all', $types)) {
        if (!in_array('caselaw', $types)) {
            $caseLaws->whereRaw('1 = 0'); // exclude all case laws
        }
    }
    
    /*
    if (!empty($countrytypes) && !in_array('all', $countrytypes)) {
        if (in_array('union', $countrytypes)) {
            $caseLaws->whereRaw('1 = 0'); // exclude all case laws
        }
    }
    */

    if (!empty($categories)) {
    $caseLaws->whereHas('categories', function($q) use ($categories) {
        $q->whereIn('db_categories.id', $categories);
    });
    }

    /*
    if (!empty($states) && !in_array('all', $states)) {
    $caseLaws->whereIn('state_id', $states);
    }
    */
    
    if (!empty($countrytypes) && !in_array('all', $countrytypes)) {
    $caseLaws->where(function($q) use ($countrytypes, $states) {

        // State case
        if (in_array('state', $countrytypes)) {
            $q->whereNotNull('state_id');

            if (!empty($states) && !in_array('all', $states)) {
                $q->whereIn('state_id', $states);
            }
        }
        
        if (in_array('inter', $countrytypes)) {
            // Use OR to combine with the above
            $q->where('state_id',38);
        }

        // Union case
        if (in_array('union', $countrytypes)) {
            // Use OR to combine with the above
            $q->orWhereNull('state_id');
        }

    });
    }

    if (!empty($highcourts) && !in_array('all', $highcourts)) {
    //$caseLaws->whereIn('court', $highcourts);
    $caseLaws->where(function ($q) use ($highcourts) {
        foreach ($highcourts as $hcourtt) {
            $q->orWhere('court', 'LIKE', "%{$hcourtt}%");
        }
    });

    }

    if (!empty($courttypes) && !in_array('all', $courttypes)) {
    $caseLaws->where(function ($q) use ($courttypes) {
        foreach ($courttypes as $ct) {
            $q->orWhere('court', 'LIKE', "%{$ct}%");
        }
    });
    }

    if (!empty($ngtfilter) && !in_array('all', $ngtfilter)) {
    $caseLaws->where(function ($q) use ($ngtfilter) {
        foreach ($ngtfilter as $ngt) {
            $q->orWhere('court', 'LIKE', "%{$ngt}%");
        }
    });
    }

    if (!empty($parties)) {
    $caseLaws->where('parties', 'LIKE', "%{$parties}%");
    }

    // Legal Instruments Query
    $legal = LegalInstrument::select(
        'id',
        'title',
        'year',
        'headnote',
        DB::raw("'legal' AS type"),
        DB::raw("NULL AS court"),
        DB::raw("NULL AS case_no"),
        DB::raw("NULL AS date_of_judgement"),
    );

    if ($from) $legal->where('year', '>=', $from);
    if ($to)   $legal->where('year', '<=', $to);


    if (!empty($countries) && !in_array('india', $countries)) {
            $legal->whereRaw('1 = 0'); // exclude all case laws
    }


    if (!empty($types) && !in_array('all', $types)) {
        if (!in_array('legal', $types)) {
            $legal->whereRaw('1 = 0'); // exclude all legal instruments
        }
    }

    if (!empty($courttypes) && !in_array('all', $courttypes)) {

    $legal->whereRaw('1 = 0');

    }
    
    /*
    if (!empty($countrytypes) && !in_array('all', $countrytypes)) {
        if (in_array('union', $countrytypes)) {
            $legal->whereNull('state_id'); // exclude all case laws
        }
    }
    */

    if (!empty($categories)) {
    $legal->whereHas('categories', function($q) use ($categories) {
        $q->whereIn('db_categories.id', $categories);
    });
    }

    /*
    if (!empty($states) && !in_array('all', $states)) {
    $legal->whereIn('state_id', $states);
    }
    */
    
    
    /* Fix */
    
   if (!empty($countrytypes) && !in_array('all', $countrytypes)) {
    $legal->where(function($q) use ($countrytypes, $states) {

        // STATE-level documents
        if (in_array('state', $countrytypes)) {
            $q->whereNotNull('state_id');

            // Apply states filter ONLY if specific states are selected
            if (!empty($states) && !in_array('all', $states)) {
                $q->whereIn('state_id', $states);
            }
        }
        
        
        if (in_array('inter', $countrytypes)) {
            // Use OR to combine with the above
            $q->where('state_id',38);
        }
        

        // UNION / national documents
        if (in_array('union', $countrytypes)) {
            $q->orWhereNull('state_id'); // OR instead of AND
        }

    });
}
    
    /* Fix End */

    if (!empty($parties)) {
    $legal->where('title', 'LIKE', "%{$parties}%");
    }

    // RAW UNION inside a subquery
    $query = $caseLaws->unionAll($legal);

    $all = DB::table(DB::raw("({$query->toSql()}) as docs"))
        ->mergeBindings($query->getQuery()) 
        ->orderBy('year', 'desc')
        //->skip(($page - 1) * $perPage)
        //->take($perPage)
        ->get();

    // Attach categories manually
    foreach ($all as $item) {
        if ($item->type === 'case_law') {
            $categories = \App\Models\CaseLaw::find($item->id)?->categories;
            $orderType = \App\Models\CaseLaw::find($item->id)?->orderType;
            $item->order_type_name = $orderType?->name;
        } else {
            $categories = \App\Models\LegalInstrument::find($item->id)?->categories;
            $item->order_type_name = null;
        }

        $item->categories = $categories ?? collect();
    }

    return response()->json([
        'html' => view('layouts.partials.document-list', ['all' => $all])->render(),
        'hasMore' => ($all->count() == $perPage),
        'nextPage' => $page + 1,
    ]);
}



}
