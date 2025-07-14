<?php

namespace Jazer\Rentals\Http\Controllers\Delete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Task: Create a function that will delete job post
 */

class DeleteRentalPost extends Controller
{
    public static function delete(Request $request) {

        $request->validate([
        'reference_id'         => 'required'
        ]);
        $deleted = DB::connection("conn_rentals")->table("rental_post")
            ->where([
                "project_refid"  => config('jtrentalsconfig.project_refid'),
                "reference_id" => $request['reference_id']
            ])
            ->delete();

        if($deleted) {
            return [
                "success"   => true,
                "message"   => "Successfully rental post deleted."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to delete rental post."
            ];
        }
    }
}