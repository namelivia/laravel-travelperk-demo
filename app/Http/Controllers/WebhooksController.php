<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Illuminate\Support\Facades\Request;

class WebhooksController extends Controller
{
    /**
     * Show all webhooks.
     *
     * @return View
     */
    public function all()
    {
        return view('webhooks', [
            'response' => TravelPerk::webhooks()->webhooks()->all(),
            'events' => TravelPerk::webhooks()->webhooks()->events(),
        ]);
    }

    /**
     * Show a single webhook.
     *
     * @return View
     */
    public function view(string $id)
    {
        $webhook = TravelPerk::webhooks()->webhooks()->get($id);
        return view('webhook', ['data' => $webhook]);
    }

}
