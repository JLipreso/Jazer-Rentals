<?php

namespace Jazer\Rentals\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RentalBookingStatus extends Controller
{
   public function updatestatus(Request $request) {
        
        $request->validate([
        'reference_id'   => 'required',
        'status'         => 'required|in:PDG,ACC,ONG,CNC,CLS',
    ], [
        'status.in'      => 'The status field must be one of: PDG, ACC, ONG, CNC, CLS.',
    ]);
    
       $updated = DB::connection("conn_rentals")->table("rental_booking")
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
                "message"   => "Successfully rental booking status updated."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to update rental booking status."
            ];
        }
    }
}