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
                                <td>Action</td>
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
                                <td>
                                    <a href="#">
                                        <span class="fa fa-edit"
                                              data-open="editSponsorRecordModal"
                                              ng-click="setIndex($index); getSponsorRecord(sponsor)">
                                        </span>
                                    </a>&nbsp;

                                    <a data-open="deleteSponsorDetailsModal"
                                       ng-click="deleteResource(sponsor_records[$index].person_id)">
                                        <span class="fa fa-trash"></span>
                                    </a>

                                </td>
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

                        <div class="small reveal" id="editSponsorRecordModal" data-reveal>
                            @include('sponsors.edit')

                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div id="deleteSponsorDetailsModal" class="reveal" data-reveal ng-controller="SponsorController">
                            <div>
                                Are you sure you want to delete this record? This will
                                lead to deletion of other subsequent records attached to this record.
                            </div>

                            <div class="row form-submit-section">
                                <a ng-click="deleteSponsorRecord('/sponsor/delete/' + delete_record_id)"
                                   style="margin-bottom: -5px;"
                                   class="button alert" aria-label="Close modal" data-close>
                                    Delete
                                </a>
                                &nbsp;&nbsp;
                                <a href="" class="button save-button" style="margin-bottom: -5px;" data-close>Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection