<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\Webhooks\CreateWebhookInputParams;
use Namelivia\TravelPerk\Webhooks\UpdateWebhookInputParams;
use Namelivia\TravelPerk\Webhooks\WebhooksInputParams;
use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    /**
     * Show all webhooks.
     *
     * @return View
     */
    public function all(Request $request)
    {
        $params = new WebhooksInputParams();

        $limit = $request->input("limit");
		if (isset($limit)) {
			$params->setLimit($limit);
		}

        $accountNumber = $request->input("account_number");
		if (isset($accountNumber)) {
			$params->setTravelperkBankAccountNumber($accountNumber);
		}

        $offset = $request->input("offset");
		if (isset($offset)) {
			$params->setOffset($offset);
		}

        return view('webhooks', [
            'response' => TravelPerk::webhooks()->webhooks()->all($params),
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
            'error' => null,
            'response' => null,
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
            'error' => null,
            'response' => null,
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
        $error = null;
        $response = null;
        $payload = (array) json_decode($request->input("testData"));
        try {
            $response = TravelPerk::webhooks()->webhooks()->test($id, $payload);
        } catch (\Exception $e){
            $error = $e->getMessage();
        }
        $webhook = TravelPerk::webhooks()->webhooks()->get($id);
        return view('webhook', [
            'data' => $webhook,
            'error' => $error,
            'response' => $response,
        ]);
    }
}
