<?php

namespace Jazer\Rentals\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateRentalPost extends Controller
{
    public function update(Request $request) {
        
        $request->validate([
        'reference_id'   => 'required',
        'category'       => 'required|in:VHC,EQP,CLT,STR,BKS,PWT,MSI,PHO,FUR,ELC,HAP,KTW,OFE,WDA,SPE,LUX,PTS,MDE',
        'currency'       => 'required|in:USD,EUR,JPY,GBP,CHF,CAD,AUD,ZAR,PHP',
        'price_curr'     => 'required|numeric',
        'price_prev'     => 'required|numeric',
        'duration'       => 'required|in:1HR,8HR,12HR,24HR',
        ], [
            'category.in'    => 'The category field must be one of: VHC, EQP, CLT, STR, BKS, PWT, MSI, PHO, 
            FUR, ELC, HAP, KTW, OFE, WDA, SPE, LUX, PTS, MDE.',
            'currency.in'    => 'The currency field must be one of: USD, EUR, JPY, GBP, CHF, CAD, AUD, ZAR, PHP.',
            'duration.in'    => 'The duration field must be one of: 1HR, 8HR, 12HR, 24HR.',
    ]);
    
       $updated = DB::connection("conn_rentals")->table("rental_post")
            ->where([
                "project_refid"  => config('jtrentalsconfig.project_refid'),
                "reference_id" => $request['reference_id']
            ])
            ->update([
                "branch_refid"         => $request['branch_refid'],
                "business_refid"       => $request['business_refid'],
                "market_place_list"    => $request['market_place_list'],
                "category"             => $request['category'],
                "name"                 => $request['name'],
                "description"          => $request['description'],
                "currency"             => $request['currency'], 
                "price_curr"           => $request['price_curr'],
                "price_prev"           => $request['price_prev'],
                "duration"             => $request['duration'], 
            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully rental post updated."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to update rental post."
            ];
        }
    }
}