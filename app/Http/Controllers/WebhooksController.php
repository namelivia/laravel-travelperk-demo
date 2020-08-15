<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\Webhooks\CreateWebhookInputParams;
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

    /**
     * Show the create webhook form.
     *
     * @return View
     */
    public function create()
    {
        return view('create-webhook');
    }

    /**
     * Create a new webhook.
     *
     * @return View
     */
    public function save()
    {
        $webhook = TravelPerk::webhooks()->webhooks()->create(new CreateWebhookInputParams(
            Request::input('name'),
            Request::input('url'),
            Request::input('secret'),
            ['invoice.issued']
        ));
        return view('webhook', ['data' => $webhook]);
    }

    /**
     * Delete a webhook.
     *
     * @return View
     */
    public function delete(string $id)
    {
        $webhook = TravelPerk::webhooks()->webhooks()->delete($id);
        return view('webhooks', [
            'response' => TravelPerk::webhooks()->webhooks()->all(),
            'events' => TravelPerk::webhooks()->webhooks()->events(),
        ]);
    }
}
