<?php

namespace Jazer\Rentals\Http\Controllers\Create;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalBooking extends Controller
{
    public static function create(Request $request) {

       $request->validate([
        'duration'     => 'required|integer|max:999',
        'total'        => 'required|numeric',
        'status'       => 'required|in:PDG,ACC,ONG,CNC,CLS',
        ], [
            'status.in'      => 'The status field must be one of: PDG, ACC, ONG, CNC, CLS.',
    ]);
        
            $submitted = DB::connection("conn_rentals")->table("rental_booking")->insert([
                "project_refid"        => config('jtrentalsconfig.project_refid'),
                "reference_id"         => \Jazer\Rentals\Http\Controllers\Utility\ReferenceID::create('RLB'),
                "branch_refid"         => $request['branch_refid'],
                "convo_refid"          => $request['convo_refid'],
                "item_refid"           => $request['item_refid'],
                "user_refid"           => $request['user_refid'],
                "duration"             => $request['duration'],
                "total"                => $request['total'], 
                "created_at"           => Carbon::now(),
                "created_by"           => $request['created_by'],
                "status"               => $request['status']
                                            
            ]);

            if($submitted) {
                return [
                    "success"   => true,
                    "message"   => "Successfully rental booking created."
                ];
            }
            else {
                return [
                    "success"   => false,
                    "message"   => "Failed to rental booking post."
                ];
            }
        
    }
}