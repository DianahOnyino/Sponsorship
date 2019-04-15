<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 09:03
 */

namespace App\Http\Controllers;


use App\ChildSponsorDetail;
use App\Http\Requests\SponsorRequest;
use App\Person;
use App\Repositories\SponsorRepository;
use App\Sponsor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class SponsorController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('sponsors.display');
    }

    public function save()
    {
        $input = Input::all();

        $sponsor_record_request = new SponsorRequest();

        $validator = $sponsor_record_request->validate($input);

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        }

        $existing_sponsor_record = Person::where('first_name', $input['first_name'])
                                        ->where('last_name', $input['last_name'])
                                        ->where('middle_name', $input['last_name'])
                                        ->where('age', $input['age'])
                                        ->count();

        if ($existing_sponsor_record > 0) {
            return Response::json(['duplicate_error' => 'An exact child record already exists!']);
        }

        $sponsorRepository = new SponsorRepository();

        try {
            $person_details_id = $sponsorRepository->savePersonDetails($input);

            $sponsorRepository->saveSponsorDetails($person_details_id, $input);
        } catch (\Exception $exception){
            dd($exception->getMessage());
        }

        return "Information successfully saved!";
    }

    public function edit()
    {
        return view('sponsors.edit');
    }

    public function update()
    {
        $input = Input::all();

        $sponsor_record_request = new SponsorRequest();

        $validator = $sponsor_record_request->validate($input);

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        }

        $sponsorRepository = new SponsorRepository();

        try {
            $person_details_id = $sponsorRepository->savePersonDetails($input, $input['person_id']);

            $sponsorRepository->saveSponsorDetails($person_details_id, $input, $person_details_id);
        } catch (\Exception $exception){

        }

        return "Information successfully saved!";
    }

    public function destroy($person_id)
    {
        $person_details = Person::find($person_id);

        $sponsor = Sponsor::where('person_id', $person_id);

        ChildSponsorDetail::where('sponsor_id', $sponsor->first()->id)->delete();

        $sponsor->delete();

        $person_details->delete();
    }
}