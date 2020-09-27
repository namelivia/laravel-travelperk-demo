<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
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
        $query = TravelPerk::expenses()->invoices()->query();

        // Statically fixing the limit to 50 by now
        $limit = 50;
		$query->setLimit($limit);

        $accountNumber = $request->input("account_number");
		if (isset($accountNumber)) {
			$query->setTravelperkBankAccountNumber($accountNumber);
        }

        $page = $request->input("page");
		if (isset($page)) {
			$query->setOffset($page * $limit);
        }

        return view('invoices', [
            'response' => $query->get(),
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
        $query = TravelPerk::expenses()->invoiceProfiles()->query();

        // Statically fixing the limit to 15 by now
        $limit = 15;
		$query->setLimit($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$query->setOffset($page * $limit);
        }
        return view('invoice-profiles', [
            'response' => $query->get(),
        ]);
    }

    /**
     * Show all invoice lines.
     *
     * @return View
     */
    public function lines(Request $request)
    {
        $query = TravelPerk::expenses()->invoices()->linesQuery();

        // Statically fixing the limit to 50 by now
        $limit = 50;
		$query->setLimit($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$query->setOffset($page * $limit);
		}

        return view('invoice-lines', [
            'response' => $query->get()
        ]);
    }
}
