<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\Expenses\InvoicesInputParams;
use Namelivia\TravelPerk\Expenses\InvoiceLinesInputParams;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Show all invoices.
     *
     * @return View
     */
    public function all(Request $request)
    {
        $params = new InvoicesInputParams();

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

        return view('invoices', [
            'response' => TravelPerk::expenses()->invoices()->all($params),
            'account_number' => $accountNumber,
        ]);
    }

    /**
     * Show a single invoice.
     *
     * @return View
     */
    public function view(string $serialNumber)
    {
        $invoice = TravelPerk::expenses()->invoices()->get($serialNumber);
        return view('invoice', ['data' => $invoice]);
    }

    /**
     * Show all invoice profiles.
     *
     * @return View
     */
    public function profiles()
    {
        return view('invoice-profiles', [
            'data' => TravelPerk::expenses()->invoiceProfiles()->all()
        ]);
    }

    /**
     * Show all invoice lines.
     *
     * @return View
     */
    public function lines(Request $request)
    {
        $params = new InvoiceLinesInputParams();

        // Statically fixing the limit to 10 by now
        /*$limit = $request->input("limit");
		if (isset($limit)) {
			$params->setLimit($limit);
        }*/
		$params->setLimit(50);

        $offset = $request->input("page");
		if (isset($offset)) {
			$params->setOffset($offset);
		}

        return view('invoice-lines', [
            'response' => TravelPerk::expenses()->invoices()->lines($params)
        ]);
    }
}
