<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TravelSafeController extends Controller
{
    /**
     * Show all invoice lines.
     *
     * @return View
     */
    public function index()
    {
        return view('travelsafe', [
            'locationTypes' => Travelperk::travelSafe()->travelSafe()->locationTypes(),
        ]);
    }

    /**
     * Get restrictions.
     *
     * @return View
     */
    public function restrictions(Request $request)
    {
        $data = Travelperk::travelSafe()->travelSafe()->travelRestrictions(
            $request->input('origin'),
            $request->input('destination'),
            $request->input('originType'),
            $request->input('destinationType'),
            Carbon::parse($request->input('date'))
        );
        return view('restrictions', [
            'data' => $data,
        ]);
    }

    /**
     * Get summary.
     *
     * @return View
     */
    public function summary(Request $request)
    {
        $data = Travelperk::travelSafe()->travelSafe()->localSummary(
            $request->input('location'),
            $request->input('locationType')
        );
        return view('summary', [
            'data' => $data,
        ]);
    }

    /**
     * Get airline.
     *
     * @return View
     */
    public function airline(Request $request)
    {
        $data = Travelperk::travelSafe()->travelSafe()->airlineSafetyMeasures(
            $request->input('iata'),
        );
        return view('airline', [
            'data' => $data,
        ]);
    }
}
