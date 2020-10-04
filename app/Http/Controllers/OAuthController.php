<?php

namespace App\Http\Controllers;

use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    /**
     * OAuth callback method
     */
    public function callback(Request $request)
    {
        //TODO: Verify the state
        TravelPerk::setAuthorizationCode($request->input("code"));
        $query = TravelPerk::expenses()->invoices()->query();
        return view('invoices', [
            'response' => $query->get(),
        ]);
        return redirect('/');
    }
}
