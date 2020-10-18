<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use Namelivia\TravelPerk\SCIM\UsersInputParams;
use Namelivia\TravelPerk\SCIM\ReplaceUserInputParams;
use Namelivia\TravelPerk\SCIM\NameInputParams;
use Namelivia\TravelPerk\SCIM\Language;
use Namelivia\TravelPerk\SCIM\Gender;
use Namelivia\TravelPerk\SCIM\EmergencyContact;
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

		$params = new ReplaceUserInputParams(
            $request->input('userName'),
			true, #Always active
			$name
		);

        $language = $request->input("language");
		if (isset($language)) {
			$params->setLanguage(new Language($language));
		}

        $phoneNumber = $request->input("phoneNumber");
		if (isset($phoneNumber)) {
			$params->setPhoneNumber($phoneNumber);
		}

        $locale = $request->input("locale");
		if (isset($locale)) {
			$params->setLocale($locale);
		}

        $title = $request->input("title");
		if (isset($title)) {
			$params->setTitle($title);
		}

        $externalId = $request->input("externalId");
		if (isset($externalId)) {
			$params->setExternalId($externalId);
		}

        $gender = $request->input("gender");
		if (isset($gender)) {
			$params->setGender(new Gender($gender));
		}

        $dateOfBirth = $request->input("dateOfBirth");
		if (isset($dateOfBirth)) {
			$params->setDateOfBirth(Carbon::parse($dateOfBirth));
		}

        $travelPolicy = $request->input("travelPolicy");
		if (isset($travelPolicy)) {
			$params->setTravelPolicy($travelPolicy);
		}

        $costCenter = $request->input("costCenter");
		if (isset($costCenter)) {
			$params->setCostCenter($costCenter);
		}

        $manager = $request->input("manager");
		if (isset($manager)) {
			$params->setManager($manager);
		}

        $emergencyContactName = $request->input("emergencyContactName");
        $emergencyContactPhone = $request->input("emergencyContactPhone");
		if (isset($emergencyContactName) && isset($emergencyContactPhone)) {
			$params->setEmergencyContact(
				new EmergencyContact($emergencyContactName, $emergencyContactPhone)
			);
		}

		$user = TravelPerk::scim()->users()->replace($id, $params);
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
}
