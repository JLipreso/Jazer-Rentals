<?php

namespace Jazer\JobPosting\Http\Controllers\Delete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Task: Create a function that will delete job post
 */

class DeleteJobPost extends Controller
{
    public static function delete(Request $request) {

        $request->validate([
        'reference_id'         => 'required'
        ]);
        $deleted = DB::connection("conn_jobposting")->table("job_post")
            ->where([
                "project_refid"  => config('jtjobpostingconfig.project_refid'),
                "reference_id" => $request['reference_id']
            ])
            ->delete();

        if($deleted) {
            return [
                "success"   => true,
                "message"   => "Successfully job post deleted."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to delete job post."
            ];
        }
    }
}