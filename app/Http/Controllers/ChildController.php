<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildRecordRequest;
use App\Person;
use App\Repositories\ChildRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ChildController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('children.display');
    }

    public function save()
    {
        $input = Input::all();

        $child_record_request = new ChildRecordRequest();

        $validator = $child_record_request->validate($input);

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        }

        $existing_person_record = Person::where('first_name', $input['first_name'])
                                      ->where('last_name', $input['last_name'])
                                      ->where('middle_name', $input['last_name'])
                                      ->count();

        if ($existing_person_record > 0) {
            return Response::json(['duplicate_error' => 'An exact child record already exists!']);
        }

        $childRepository = new ChildRepository();

        try {
            $person_details_id = $childRepository->savePersonDetails($input);

            $childRepository->saveChildDetails($person_details_id, $input);
        } catch (\Exception $exception){

        }

        return "Information successfully saved!";
    }

    public function edit()
    {
        return view('children.edit');
    }

    public function update()
    {
        $input = Input::all();

        $child_record_request = new ChildRecordRequest();

        $validator = $child_record_request->validate($input);

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        }

        $childRepository = new ChildRepository();

        try {
            $person_details_id = $childRepository->savePersonDetails($input, $input['person_id']);

            $childRepository->saveChildDetails($person_details_id, $input, $person_details_id);
        } catch (\Exception $exception){

        }

        return "Information successfully saved!";
    }
}
