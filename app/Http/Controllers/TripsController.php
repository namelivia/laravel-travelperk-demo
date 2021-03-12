<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    //TODO:These fields are missing
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

    //TODO:These fields are missing
    private function getBookingFilteringFields()
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
        return view('trips', [
            'response' => $query->get(),
            'filteringFields' => $this->getTripFilteringFields(),
        ]);
    }

    /**
     * Show all trips
     *
     * @return View
     */
    public function bookings(Request $request)
	{
        $query = TravelPerk::trips()->bookings()->query();

        // Statically fixing the limit to 50 by now
        $limit = 50;
		$query->setLimit($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$query->setStartIndex(($page * $limit) + 1);
		}

        foreach($this->getBookingFilteringFields() as $filter) {
            $value = $request->input($filter['param']);
            if (isset($value)) {
                $filter['method']($query, $value);
            }
        }

		$data = $query->get();
        return view('bookings', [
            'response' => $query->get(),
            'filteringFields' => $this->getBookingFilteringFields(),
        ]);
    }
}
