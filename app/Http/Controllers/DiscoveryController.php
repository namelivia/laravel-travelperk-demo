<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Illuminate\Support\Facades\Request;

class DiscoveryController extends Controller
{
    /**
     * Show all discovery information.
     *
     * @return View
     */
    public function discovery()
    {
        return view('discovery', [
            'serviceProviderConfig' => TravelPerk::scim()->discovery()->serviceProviderConfig(),
            'resourceTypes' => TravelPerk::scim()->discovery()->resourceTypes(),
            'schemas' => TravelPerk::scim()->discovery()->schemas(),
            'userSchema' => TravelPerk::scim()->discovery()->userSchema(),
            'enterpriseUserSchema' => TravelPerk::scim()->discovery()->enterpriseUserSchema(),
        ]);
    }

}
