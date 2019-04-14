<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $children_records = Child::all();

        return view('children.display', compact('children_records'));
    }
}
