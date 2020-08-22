<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\Webhooks\CreateWebhookInputParams;
use Namelivia\TravelPerk\Webhooks\UpdateWebhookInputParams;
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
        $webhook = TravelPerk::webhooks()->webhooks()->create(new CreateWebhookInputParams(
            $request->input('name'),
            $request->input('url'),
            $request->input('secret'),
            $request->input('events'),
        ));
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
        $params = new UpdateWebhookInputParams();

        $name = $request->input("name");
		if (isset($name)) {
			$params->setName($name);
		}

        $secret = $request->input("secret");
		if (isset($secret)) {
			$params->setSecret($secret);
		}

        $url = $request->input("url");
		if (isset($url)) {
			$params->setUrl($url);
		}

        $enabled = $request->input("enabled");
		if (isset($enabled)) {
			$params->setEnabled(true);
        } else {
			$params->setEnabled(false);
        }

        $events = $request->input("events");
		if (isset($events)) {
			$params->setEvents($events);
		}

        $webhook = TravelPerk::webhooks()->webhooks()->update($id, $params);

        return view('modify-webhook', [
            'data' => $webhook,
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
