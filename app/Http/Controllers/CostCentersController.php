<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CostCentersController extends Controller
{
    /**
     * Show all cost centers.
     *
     * @return View
     */
    public function all(Request $request)
	{
        return view('cost_centers', [
            'response' => TravelPerk::costCenters()->costCenters()->all()
        ]);
    }

    /**
     * Show a single cost center.
     *
     * @return View
     */
    public function view(string $id)
	{
        $costCenter = TravelPerk::costCenters()->costCenters()->get($id);
        return view('cost_center', ['data' => $costCenter]);
    }

    /**
     * Show the modify cost center form.
     *
     * @return View
     */
    public function modify(Request $request, $id)
    {
        $costCenter = TravelPerk::costCenters()->costCenters()->get($id);
        return view('modify-cost-center', [
            'data' => $costCenter
        ]);
    }

    /**
     * Update a cost center.
     *
     * @return View
     */
    public function update(Request $request, $id)
    {
        $costCenter = TravelPerk::costCenters()->costCenters()->modify($id);

        $name = $request->input("name");
		if (isset($name)) {
			$costCenter->setName($name);
		}

        $archived = $request->input("archived");
		if (isset($archived)) {
			$costCenter->setArchive(true);
        } else {
			$costCenter->setArchive(false);
        }

        $updatedCostCenter = $costCenter->save();

        return view('modify-cost-center', [
            'data' => $updatedCostCenter
        ]);
    }

    /**
     * Show the set users for cost center form.
     *
     * @return View
     */
    public function modifyUsers(Request $request, $id)
    {
        $costCenter = TravelPerk::costCenters()->costCenters()->get($id);
        $users = TravelPerk::users()->users()->query()->get();

        return view('set_users', [
            'data' => $costCenter,
            'users' => $users->users,
        ]);
    }

    /**
     * Set users for a cost center.
     *
     * @return View
     */
    public function setUsers(Request $request, $id)
    {
        $users = $request->input("users");
        $setUsersRequest = TravelPerk::costCenters()->costCenters()->setUsers($id);
		if (isset($users)) {
            $setUsersRequest->setIds($users);
		}
        $setUsersRequest->save();
        $costCenter = TravelPerk::costCenters()->costCenters()->get($id);
        return view('cost_center', ['data' => $costCenter]);
    }
}
