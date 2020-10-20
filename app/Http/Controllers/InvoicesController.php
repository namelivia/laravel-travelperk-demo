<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoicesController extends Controller
{
    private function getInvoiceFilteringFields()
    {
        return [
            [
                'name' => 'Profile id',
                'param' => 'profile_id',
                'method' => function($query, $value) {
                    $query->setProfileId(explode(',' , $value));
                }
            ],
            [
                'name' => 'Serial number',
                'param' => 'serial_number',
                'method' => function($query, $value) {
                    $query->setSerialNumber(explode(',' , $value));
                }
            ],
            [
                'name' => 'Serial number contains',
                'param' => 'serial_number_contains',
                'method' => function($query, $value) {
                    $query->setSerialContains($value);
                }
            ],
            [
                'name' => 'Billing period',
                'param' => 'billing_period',
                'options' => TravelPerk::expenses()->invoices()->billingPeriods(),
                'method' => function($query, $value) {
                    $query->setBillingPeriod($value);
                }
            ],
            [
                'name' => 'TravelPerk bank account number',
                'param' => 'travelperk_bank_account_number',
                'method' => function($query, $value) {
                    //TODO: This doesn't seem to filter properly
                    //Look for info in the documentation
                    $query->setTravelperkBankAccountNumber($value);
                }
            ],
            [
                'name' => 'Customer country name',
                'param' => 'customer_country_name',
                'method' => function($query, $value) {
                    $query->setCustomerCountryName($value);
                }
            ],
            [
                'name' => 'Status',
                'param' => 'status',
                'options' => TravelPerk::expenses()->invoices()->statuses(),
                'method' => function($query, $value) {
                    $query->setStatus($value);
                }
            ],
            [
                'name' => 'Issuing date greater than',
                'param' => 'issuing_date_greater_than',
                'method' => function($query, $value) {
                    $query->setIssuingDateGte(Carbon::parse($value));
                }
            ],
            [
                'name' => 'Issuing date less than',
                'param' => 'issuing_date_less_than',
                'method' => function($query, $value) {
                    $query->setIssuingDateLte(Carbon::parse($value));
                }
            ],
            [
                'name' => 'Due date greater than',
                'param' => 'due_date_greater_than',
                'method' => function($query, $value) {
                    $query->setDueDateGte(Carbon::parse($value));
                }
            ],
            [
                'name' => 'Due date less than',
                'param' => 'due_date_less_than',
                'method' => function($query, $value) {
                    $query->setDueDateLte(Carbon::parse($value));
                }
            ],
        ];
    }
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

        $page = $request->input("page");
		if (isset($page)) {
			$query->setOffset($page * $limit);
        }

        foreach($this->getInvoiceFilteringFields() as $filter) {
            $value = $request->input($filter['param']);
            if (isset($value)) {
                $filter['method']($query, $value);
            }
        }

        return view('invoices', [
            'response' => $query->get(),
            'filteringFields' => $this->getInvoiceFilteringFields(),
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

    private function getInvoiceLinesFilteringFields()
    {
        return array_merge($this->getInvoiceFilteringFields(), [
            [
                'name' => 'Expense date greater than',
                'param' => 'expense_date_greater_than',
                'method' => function($query, $value) {
                    $query->setExpenseDateGte(Carbon::parse($value));
                }
            ],
            [
                'name' => 'Expense date less than',
                'param' => 'expense_date_less_than',
                'method' => function($query, $value) {
                    $query->setExpenseDateLte(Carbon::parse($value));
                }
            ],
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

        foreach($this->getInvoiceLinesFilteringFields() as $filter) {
            $value = $request->input($filter['param']);
            if (isset($value)) {
                $filter['method']($query, $value);
            }
        }

        return view('invoice-lines', [
            'response' => $query->get(),
            'filteringFields' => $this->getInvoiceLinesFilteringFields(),
        ]);
    }
}
