<?php

namespace App\Traits;
use Illuminate\Support\Carbon;


trait CommonResultTrait{
    public function sortResults($collection, $request)
    {
        if ($request->has('sort_order') && in_array($request->sort_order, ['asc', 'desc'])) {
            $collection->orderBy('datamodif', $request->sort_order);
        }
        // add other sort fields here as needed
        
        return $collection;
    }

    public function pageSelector($request)
    {
        $perpage = 10;
        if ($request->perPage) {
            $perpage = intval($request->perPage);
        }
        return $perpage;
    }

    public function makeDateFormat($date)
    {
        return $formattedDate = Carbon::parse($date)->format('Y-m-d');
    }
}