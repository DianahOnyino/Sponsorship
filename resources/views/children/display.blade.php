@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Children Records

                        <a class="pull-right">
                            Add
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <td></td>
                                <td>First Name</td>
                                <td>Middle Name</td>
                                <td>Last Name</td>
                                <td>Age</td>
                                <td>Country</td>
                                <td>City</td>
                                <td>Village</td>
                                <td>Highest Level of Education</td>
                                <td>Class Level</td>
                                <td>School Name</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($children_records as $child)
                                <tr>
                                    <td></td>
                                    <td>{!! $child->first_name !!}</td>
                                    <td>{!! $child->middle_name !!}</td>
                                    <td>{!! $child->last_name !!}</td>
                                    <td>{!! $child->age !!}</td>
                                    <td>{!! $child->country !!}</td>
                                    <td>{!! $child->city !!}</td>
                                    <td>{!! $child->village !!}</td>
                                    <td>{!! $child->highest_level_of_education !!}</td>
                                    <td>{!! $child->level !!}</td>
                                    <td>{!! $child->class_level !!}</td>
                                    <td>{!! $child->school_name !!}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">There are no records yet.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection