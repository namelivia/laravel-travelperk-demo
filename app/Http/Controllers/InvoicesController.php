<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\Expenses\InvoicesInputParams;
use Namelivia\TravelPerk\Expenses\InvoiceLinesInputParams;
use Namelivia\TravelPerk\Pagination\Pagination;
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

        // Statically fixing the limit to 50 by now
        $limit = 50;
		$params->setLimit($limit);

        $accountNumber = $request->input("account_number");
		if (isset($accountNumber)) {
			$params->setTravelperkBankAccountNumber($accountNumber);
        }

        $page = $request->input("page");
		if (isset($page)) {
			$params->setOffset($page * $limit);
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
    public function profiles(Request $request)
    {
        // Statically fixing the limit to 15 by now
        $limit = 15;
        $page = $request->input("page");
        $offset = $page ? $page * $limit : 0;
        $params = new Pagination($offset, $limit);
        return view('invoice-profiles', [
            'response' => TravelPerk::expenses()->invoiceProfiles()->all($params),
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

        // Statically fixing the limit to 50 by now
        $limit = 50;
		$params->setLimit($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$params->setOffset($page * $limit);
		}

        return view('invoice-lines', [
            'response' => TravelPerk::expenses()->invoices()->lines($params)
        ]);
    }
}
