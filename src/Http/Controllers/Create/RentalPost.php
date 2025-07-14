<?php

namespace Jazer\Rentals\Http\Controllers\Create;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalPost extends Controller
{
    public static function create(Request $request) {

       $request->validate([
        'category'       => 'required|in:VHC,EQP,CLT,STR,BKS,PWT,MSI,PHO,FUR,ELC,HAP,KTW,OFE,WDA,SPE,LUX,PTS,MDE',
        'currency'       => 'required|in:USD,EUR,JPY,GBP,CHF,CAD,AUD,ZAR,PHP',
        'price_curr'     => 'required|numeric',
        'price_prev'     => 'required|numeric',
        'duration'       => 'required|in:1HR,8HR,12HR,24HR',
        'status'         => 'required|in:DRF,PUB,ARC',
        ], [
            'category.in'    => 'The category field must be one of: VHC, EQP, CLT, STR, BKS, PWT, MSI, PHO, 
            FUR, ELC, HAP, KTW, OFE, WDA, SPE, LUX, PTS, MDE.',
            'currency.in'    => 'The currency field must be one of: USD, EUR, JPY, GBP, CHF, CAD, AUD, ZAR, PHP.',
            'duration.in'    => 'The duration field must be one of: 1HR, 8HR, 12HR, 24HR.',
            'status.in'      => 'The status field must be one of: DRF, PUB, ARC.',
    ]);
        
            $submitted = DB::connection("conn_rentals")->table("rental_post")->insert([
                "project_refid"        => config('jtrentalsconfig.project_refid'),
                "reference_id"         => \Jazer\Rentals\Http\Controllers\Utility\ReferenceID::create('RLP'),
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
                "created_at"           => Carbon::now(),
                "created_by"           => $request['created_by'],
                "status"               => $request['status']
                                            
            ]);

            if($submitted) {
                return [
                    "success"   => true,
                    "message"   => "Successfully rental post created."
                ];
            }
            else {
                return [
                    "success"   => false,
                    "message"   => "Failed to rental job post."
                ];
            }
        
    }
}