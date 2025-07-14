<?php

namespace Jazer\Rentals\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SingleRentalBooking extends Controller
{
    public static function single(Request $request) {
        $source = DB::connection("conn_rentals")
        ->table("rental_booking")
        ->select("reference_id", "project_refid", "branch_refid", "convo_refid", "item_refid", 
        "user_refid", "duration", "total", "created_at",
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


