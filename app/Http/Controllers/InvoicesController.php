<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\Expenses\InvoicesInputParams;
use Namelivia\TravelPerk\Expenses\InvoiceLinesInputParams;
use Illuminate\Support\Facades\Request;

class InvoicesController extends Controller
{
    /**
     * Show all invoices.
     *
     * @return View
     */
    public function all()
    {
        $params = new InvoicesInputParams();

        $limit = Request::input("limit");
		if (isset($limit)) {
			$params->setLimit($limit);
		}

        $accountNumber = Request::input("account_number");
		if (isset($accountNumber)) {
			$params->setTravelperkBankAccountNumber($accountNumber);
		}

        $offset = Request::input("offset");
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
        return view('invoice-profiles', ['data' => TravelPerk::expenses()->invoiceProfiles()->all()]);
    }

    /**
     * Show all invoice lines.
     *
     * @return View
     */
    public function lines()
    {
        $params = new InvoiceLinesInputParams();

        $limit = Request::input("limit");
		if (isset($limit)) {
			$params->setLimit($limit);
		}

        $accountNumber = Request::input("account_number");
		if (isset($accountNumber)) {
			$params->setTravelperkBankAccountNumber($accountNumber);
		}

        $offset = Request::input("offset");
		if (isset($offset)) {
			$params->setOffset($offset);
		}

        return view('invoice-lines', [
            'response' => TravelPerk::expenses()->invoices()->lines($params),
            'account_number' => $accountNumber,
        ]);
    }
}
