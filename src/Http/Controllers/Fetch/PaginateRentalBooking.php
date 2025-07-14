<?php

namespace Jazer\Rentals\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaginateRentalBooking extends Controller
{
    public static function paginate(Request $request) {
        $query = DB::connection("conn_rentals")->table("rental_booking")
        ->where("project_refid", config('jtrentalsconfig.project_refid'));

    if (!empty($request['search'])) {
        $search = $request['search'];
        $query->where(function ($q) use ($search) {
            $q->where('reference_id', 'like', "%{$search}%")
            ->orWhere('convo_refid', 'like', "%{$search}%")
            ->orWhere('item_refid', 'like', "%{$search}%")
            ->orWhere('duration', 'like', "%{$search}%")
            ->orWhere('status', 'like', "%{$search}%");
        });
    }

    return $query
        ->orderBy("dataid", "desc")
        ->paginate(config('jtrentalsconfig.fetch_paginate_max'));
        }
}