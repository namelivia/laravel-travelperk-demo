<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    /**
     * Show all users.
     *
     * @return View
     */
    public function all()
    {
        return view('users', [
            'response' => TravelPerk::scim()->users()->all(),
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
        $user = TravelPerk::scim()->users()->create();
        return view('user', [
            'data' => $user,
        ]);
    }

    /**
     * Delete a user.
     *
     * @return View
     */
    public function delete(string $id)
    {
        $webhook = TravelPerk::scim()->users()->delete($id);
        return view('users', [
            'response' => TravelPerk::scim()->users()->all()
        ]);
    }

    /**
     * Update a user.
     *
     * @return View
     */
    public function update(Request $request, $id)
    {
		//TODO
    }
}
