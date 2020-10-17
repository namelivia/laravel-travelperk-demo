<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Illuminate\Http\Request;

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
        return view('webhook', [
            'data' => $webhook,
        ]);
    }

    /**
     * Show the create webhook form.
     *
     * @return View
     */
    public function create()
    {
        return view('create-webhook', [
            'events' => TravelPerk::webhooks()->webhooks()->events(),
        ]);
    }

    /**
     * Show the modify webhook form.
     *
     * @return View
     */
    public function modify(Request $request, $id)
    {
        $webhook = TravelPerk::webhooks()->webhooks()->get($id);
        return view('modify-webhook', [
            'data' => $webhook,
            'events' => TravelPerk::webhooks()->webhooks()->events(),
        ]);
    }

    /**
     * Create a new webhook.
     *
     * @return View
     */
    public function save(Request $request)
    {
        $webhook = TravelPerk::webhooks()->webhooks()->create(
            $request->input('name'),
            $request->input('url'),
            $request->input('secret'),
            $request->input('events'),
        );
        return view('webhook', [
            'data' => $webhook,
        ]);
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

    /**
     * Update a webhook.
     *
     * @return View
     */
    public function update(Request $request, $id)
    {
        $webhook = TravelPerk::webhooks()->webhooks()->modify($id);

        $name = $request->input("name");
		if (isset($name)) {
			$webhook->setName($name);
		}

        $secret = $request->input("secret");
		if (isset($secret)) {
			$webhook->setSecret($secret);
		}

        $url = $request->input("url");
		if (isset($url)) {
			$webhook->setUrl($url);
		}

        $enabled = $request->input("enabled");
		if (isset($enabled)) {
			$webhook->setEnabled(true);
        } else {
			$webhook->setEnabled(false);
        }

        $events = $request->input("events");
		if (isset($events)) {
			$webhook->setEvents($events);
		}

        $updatedWebhook = $webhook->save();

        return view('modify-webhook', [
            'data' => $updatedWebhook,
            'events' => TravelPerk::webhooks()->webhooks()->events(),
        ]);
    }

    /**
     * Test a webhook.
     *
     * @return View
     */
    public function test(Request $request, $id)
    {
        $response = TravelPerk::webhooks()->webhooks()->test($id);
        $webhook = TravelPerk::webhooks()->webhooks()->get($id);
        return view('webhook', [
            'data' => $webhook
        ]);
    }
}
