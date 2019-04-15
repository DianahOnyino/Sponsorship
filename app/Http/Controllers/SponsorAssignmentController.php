<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 11:59
 */

namespace App\Http\Controllers;


use App\ChildSponsorDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SponsorAssignmentController extends Model
{
    public function index()
    {
        return view('sponsors_assignment.display');
    }

    public function assign()
    {
        $input = Input::all();
        $child_id = $input['child_id'];
        $sponsor_id = $input['sponsor_id'];

        if ($child_id == 'Select Child') {
            return redirect()->back()->withInput()->with('error', 'Select the child to be assigned to a sponsor');
        }

        if ($sponsor_id == 'Select Sponsor') {
            return redirect()->back()->withInput()->with('error', 'Select the sponsor to assign to a child');
        }

        $this->assignASponsorAChild($child_id, $sponsor_id);

        return redirect()->back()->with('success', 'Successfully assigned a sponsor a child');
    }

    public function assignASponsorAChild($child_id, $sponsor_id)
    {
        $child_sponsor_details = new ChildSponsorDetail();

        $child_sponsor_details->child_id = $child_id;
        $child_sponsor_details->sponsor_id = $sponsor_id;
        $child_sponsor_details->date_assigned = Carbon::now()->format('Y-m-d');
        $child_sponsor_details->assigned_by = Auth::id();

        $child_sponsor_details->save();
    }
}