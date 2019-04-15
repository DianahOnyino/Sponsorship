@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="SponsorController">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Sponsors Records

                        <a class="pull-right" href="#" data-open="createSponsorRecordModal">
                            Add
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>

                        <div class="small reveal" id="createSponsorRecordModal" data-reveal>
                            @include('sponsors.create')

                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table st-pipe="callServer" st-table="sponsor_records" class="table responsive table-scroll">
                            <thead class="no_head_style">
                            <tr>
                                <th colspan="4">
                                    <input st-search class="form-control" placeholder="Search ..." type="text"/>
                                </th>
                            </tr>
                            </thead>

                            <thead>
                            <tr>
                                <td></td>
                                <td>First Name</td>
                                <td>Middle Name</td>
                                <td>Last Name</td>
                                <td>Age</td>
                                <td>Country</td>
                                <td>City</td>
                                <td>Occupation</td>
                                <td>Motivation</td>
                            </tr>
                            </thead>
                            <tbody ng-show="!isLoading">
                            <tr ng-if="sponsor_records.length != 0" ng-repeat="sponsor in sponsor_records" ng-cloak>
                                <td><% $index+1 %></td>
                                <td><% sponsor.first_name %></td>
                                <td><% sponsor.middle_name %></td>
                                <td><% sponsor.last_name %></td>
                                <td><% sponsor.age %></td>
                                <td><% sponsor.country %></td>
                                <td><% sponsor.city %></td>
                                <td><% sponsor.occupation %></td>
                                <td><% sponsor.motivation %></td>
                            </tr>
                            <tr ng-if="sponsor_records.length == 0" ng-cloak>
                                <td colspan="12">There are no records yet.</td>
                            </tr>
                            <tr>
                                <td class="notification-footer" colspan="6">
                                    <div class="pull-left" st-pagination="" st-items-by-page="itemsByPage"></div>
                                </td>
                                <td colspan="3"></td>
                            </tr>
                            </tbody>
                            <tbody ng-show="isLoading">
                            <tr>
                                <td class="text-center loading"><img src="/assets/images/loading.gif"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection