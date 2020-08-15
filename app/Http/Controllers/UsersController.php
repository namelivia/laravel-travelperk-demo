<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    /**
     * Show all users.
     *
     * @return View
     */
    public function all()
    {
        return view('users', [
            'response' => TravelPerk::scim()->users()->all(),
        ]);
    }

}
