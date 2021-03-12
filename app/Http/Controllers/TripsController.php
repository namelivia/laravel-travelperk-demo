<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    private function getTripFilteringFields()
    {
        return [
            [
                'name' => 'Trip id',
                'param' => 'trip_id',
                'method' => function($query, $value) {
                    $query->setTripId($value);
                }
            ]
        ];
    }

    /**
     * Show all trips
     *
     * @return View
     */
    public function all(Request $request)
	{
        $query = TravelPerk::trips()->trips()->query();

        // Statically fixing the limit to 50 by now
        $limit = 50;
		$query->setLimit($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$query->setStartIndex(($page * $limit) + 1);
		}

        foreach($this->getTripFilteringFields() as $filter) {
            $value = $request->input($filter['param']);
            if (isset($value)) {
                $filter['method']($query, $value);
            }
        }

		$data = $query->get();
		$data->total = $data->totalResults;
		$data->limit = $limit;
		$data->offset = $data->startIndex - 1;
        return view('trips', [
            'response' => $query->get(),
            'filteringFields' => $this->getTripFilteringFields(),
        ]);
    }
}
