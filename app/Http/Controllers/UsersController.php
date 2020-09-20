<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\SCIM\UsersInputParams;
use Namelivia\TravelPerk\SCIM\CreateUserInputParams;
use Namelivia\TravelPerk\SCIM\ReplaceUserInputParams;
use Namelivia\TravelPerk\SCIM\NameInputParams;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show all users.
     *
     * @return View
     */
    public function all(Request $request)
	{
        $params = new UsersInputParams();

        // Statically fixing the limit to 10 by now
        $limit = 10;
		$params->setCount($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$params->setStartIndex(($page * $limit) + 1);
		}

		$data = TravelPerk::scim()->users()->all($params);
		$data->total = $data->totalResults;
		$data->limit = $limit;
		$data->offset = $data->startIndex - 1;
        return view('users', [
            'response' => $data,
        ]);
    }

    /**
     * Show a single user.
     *
     * @return View
     */
    public function view(string $id)
    {
        $user = TravelPerk::scim()->users()->get($id);
        return view('user', [
            'data' => $user,
        ]);
    }

    /**
     * Show the create user form.
     *
     * @return View
     */
    public function create()
    {
        return view('create-user');
    }

    /**
     * Show the modify user form.
     *
     * @return View
     */
    public function modify(Request $request, $id)
    {
        $user = TravelPerk::scim()->users()->get($id);
        return view('modify-user', [
            'data' => $user
        ]);
    }

    /**
     * Create a new user.
     *
     * @return View
     */
    public function save(Request $request)
    {
		$name = new NameInputParams(
			$request->input('givenName'),
			$request->input('familyName')
		);
        $middleName = $request->input("middleName");
		if (isset($middleName)) {
			$name->setMiddleName($middleName);
		}
        $honorificPrefix = $request->input("honorificPrefix");
		if (isset($honorificPrefix)) {
			$name->setHonorificPrefix($honorificPrefix);
		}
        $user = TravelPerk::scim()->users()->create(new CreateUserInputParams(
            $request->input('userName'),
			true, #Always active
			$name
        ));
		#TODO: json decode should be done on the lib
        return view('user', [
            'data' => json_decode($user),
        ]);
    }

    /**
     * Delete a user.
     *
     * @return View
     */
    public function delete(string $id)
    {
        TravelPerk::scim()->users()->delete($id);
		$data = TravelPerk::scim()->users()->all();
		$data->total = $data->totalResults;
		$data->limit = $data->itemsPerPage;
		$data->offset = $data->startIndex;
        return view('users', [
            'response' => $data
        ]);
    }

    /**
     * Update a user.
     *
     * @return View
     */
    public function update(Request $request, $id)
    {
		$name = new NameInputParams(
			$request->input('givenName'),
			$request->input('familyName')
		);
        $middleName = $request->input("middleName");
		if (isset($middleName)) {
			$name->setMiddleName($middleName);
		}
        $honorificPrefix = $request->input("honorificPrefix");
		if (isset($honorificPrefix)) {
			$name->setHonorificPrefix($honorificPrefix);
		}
		$user = TravelPerk::scim()->users()->replace($id, new ReplaceUserInputParams(
            $request->input('userName'),
			true, #Always active
			$name
		));
        return view('modify-user', [
            'data' => $user
        ]);
    }
}
