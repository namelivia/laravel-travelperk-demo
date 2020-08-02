<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;

class InvoicesController extends Controller
{
    /**
     * Show all invoices.
     *
     * @return View
     */
    public function all()
    {
        return view('invoices', ['data' => TravelPerk::expenses()->invoices()->all()]);
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
        return view('invoice-lines', ['data' => TravelPerk::expenses()->invoices()->lines()]);
    }
}
