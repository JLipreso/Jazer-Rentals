<?php

namespace Jazer\Rentals\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RentalPostStatus extends Controller
{
   public function updatestatus(Request $request) {
        
        $request->validate([
        'reference_id'   => 'required',
        'status'         => 'required|in:DRF,PUB,ARC',
    ], [
        'status.in'      => 'The status field must be one of: DRF, PUB, ARC.',
    ]);
    
       $updated = DB::connection("conn_rentals")->table("rental_post")
            ->where([
                "project_refid"  => config('jtrentalsconfig.project_refid'),
                "reference_id"   => $request['reference_id']
            ])
            ->update([
                "status"           => $request['status']
            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully rental post status updated."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to update rental post status."
            ];
        }
    }
}