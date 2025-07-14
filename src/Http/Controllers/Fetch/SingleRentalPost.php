<?php

namespace Jazer\Rentals\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SingleRentalPost extends Controller
{
    public static function single(Request $request) {
        $source = DB::connection("conn_rentals")
        ->table("rental_post")
        ->select("reference_id", "project_refid", "branch_refid", "business_refid", "market_place_list", "category", 
        "name", "description", "currency", "price_curr", "price_prev", "duration", "created_at",
         "created_by", "status")
        ->where([
            "project_refid"     => config('jtrentalsconfig.project_refid'),
            "reference_id"      => $request['reference_id']
        ])
        ->get();

        if(count($source) > 0) {
            return $source[0];
        }
        else {
            return [];
        }
    }
}


