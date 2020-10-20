<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\SCIM\Language;
use Namelivia\TravelPerk\SCIM\Gender;
use Carbon\Carbon;
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
        $query = TravelPerk::scim()->users()->query();

        // Statically fixing the limit to 10 by now
        $limit = 10;
		$query->setCount($limit);

        $page = $request->input("page");
		if (isset($page)) {
			$query->setStartIndex(($page * $limit) + 1);
		}

		$data = $query->get();
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
		return view('create-user', [
			'languages' => [
				Language::SPANISH,
				Language::ENGLISH,
				Language::DEUTSCH,
				Language::FRENCH,
			],
			'genders' => [
				Gender::MALE,
				Gender::FEMALE,
			]
		]);
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
            'data' => $user,
			'languages' => [
				Language::SPANISH,
				Language::ENGLISH,
				Language::DEUTSCH,
				Language::FRENCH,
			],
			'genders' => [
				Gender::MALE,
				Gender::FEMALE,
			]
        ]);
    }

    /**
     * Create a new user.
     *
     * @return View
     */
    public function save(Request $request)
    {
		$newUser = TravelPerk::scim()->users()->make(
            $request->input('userName'),
			true, #Always active
			$request->input('givenName'),
			$request->input('familyName')
		);
        $middleName = $request->input("middleName");
		if (isset($middleName)) {
			$newUser->setMiddleName($middleName);
		}
        $honorificPrefix = $request->input("honorificPrefix");
		if (isset($honorificPrefix)) {
			$newUser->setHonorificPrefix($honorificPrefix);
		}

        $language = $request->input("language");
		if (isset($language)) {
			$newUser->setLanguage(new Language($language));
		}

        $locale = $request->input("locale");
		if (isset($locale)) {
			$newUser->setLocale($locale);
		}

        $title = $request->input("title");
		if (isset($title)) {
			$newUser->setTitle($title);
		}

        $phoneNumber = $request->input("phoneNumber");
		if (isset($phoneNumber)) {
			$newUser->setPhoneNumber($phoneNumber);
		}

        $externalId = $request->input("externalId");
		if (isset($externalId)) {
			$newUser->setExternalId($externalId);
		}

        $gender = $request->input("gender");
		if (isset($gender)) {
			$newUser->setGender(new Gender($gender));
		}

        $dateOfBirth = $request->input("dateOfBirth");
		if (isset($dateOfBirth)) {
			$newUser->setDateOfBirth(Carbon::parse($dateOfBirth));
		}

        $travelPolicy = $request->input("travelPolicy");
		if (isset($travelPolicy)) {
			$newUser->setTravelPolicy($travelPolicy);
		}

        return view('user', [
            'data' => $newUser->save(),
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
		$updatingUser = TravelPerk::scim()->users()->modify(
			$id,
            $request->input('userName'),
			true, #Always active
        	$request->input("givenName"),
        	$request->input("familyName")
		);

        $middleName = $request->input("middleName");
		if (isset($middleName)) {
			$updatingUser->setMiddleName($middleName);
		}
        $honorificPrefix = $request->input("honorificPrefix");
		if (isset($honorificPrefix)) {
			$updatingUser->setHonorificPrefix($honorificPrefix);
		}

        $language = $request->input("language");
		if (isset($language)) {
			$updatingUser->setLanguage(new Language($language));
		}

        $phoneNumber = $request->input("phoneNumber");
		if (isset($phoneNumber)) {
			$updatingUser->setPhoneNumber($phoneNumber);
		}

        $locale = $request->input("locale");
		if (isset($locale)) {
			$updatingUser->setLocale($locale);
		}

        $title = $request->input("title");
		if (isset($title)) {
			$updatingUser->setTitle($title);
		}

        $externalId = $request->input("externalId");
		if (isset($externalId)) {
			$updatingUser->setExternalId($externalId);
		}

        $gender = $request->input("gender");
		if (isset($gender)) {
			$updatingUser->setGender(new Gender($gender));
		}

        $dateOfBirth = $request->input("dateOfBirth");
		if (isset($dateOfBirth)) {
			$updatingUser->setDateOfBirth(Carbon::parse($dateOfBirth));
		}

        $travelPolicy = $request->input("travelPolicy");
		if (isset($travelPolicy)) {
			$updatingUser->setTravelPolicy($travelPolicy);
		}

        $costCenter = $request->input("costCenter");
		if (isset($costCenter)) {
			$updatingUser->setCostCenter($costCenter);
		}

        $manager = $request->input("manager");
		if (isset($manager)) {
			$updatingUser->setManager($manager);
		}

        $emergencyContactName = $request->input("emergencyContactName");
        $emergencyContactPhone = $request->input("emergencyContactPhone");
		if (isset($emergencyContactName) && isset($emergencyContactPhone)) {
			$updatingUser->setEmergencyContact($emergencyContactName, $emergencyContactPhone);
		}

        return view('modify-user', [
            'data' => $updatingUser->save(),
			'languages' => [
				Language::SPANISH,
				Language::ENGLISH,
				Language::DEUTSCH,
				Language::FRENCH,
			],
			'genders' => [
				Gender::MALE,
				Gender::FEMALE,
			]
        ]);
    }
}
