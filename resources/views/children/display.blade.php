@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="MainController">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Children Records

                        <a class="pull-right" href="#" data-open="createChildRecordModal">
                            Add
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>

                        <div class="small reveal" id="createChildRecordModal" data-reveal>
                            @include('children.create')

                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table st-pipe="callServer" st-table="children_records" class="table responsive table-scroll">
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
                                <td>Village</td>
                                <td>Highest Level of Education</td>
                                <td>Level</td>
                                <td>Class Level</td>
                                <td>School Name</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody ng-show="!isLoading">
                            <tr ng-if="children_records.length != 0" ng-repeat="child in children_records track by $index" ng-cloak>
                                <td><% $index+1 %></td>
                                <td><% child.first_name %></td>
                                <td><% child.middle_name %></td>
                                <td><% child.last_name %></td>
                                <td><% child.age %></td>
                                <td><% child.country %></td>
                                <td><% child.city %></td>
                                <td><% child.village %></td>
                                <td><% child.highest_level_of_education %></td>
                                <td><% child.level %></td>
                                <td><% child.class_level %></td>
                                <td><% child.school_name %></td>
                                <td>
                                    <a href="#">
                                        <span class="fa fa-edit"
                                              data-open="editChildRecordModal"
                                              ng-click="setIndex($index); getChildRecord(child)">
                                        </span>
                                    </a>&nbsp;

                                    {{--<a href="/child/delete/{id}" ><span class="fa fa-trash"></span></a>--}}
                                    <a data-open="deleteChildDetailsModal"
                                       ng-click="deleteResource(children_records[$index].person_id)">
                                        <span class="fa fa-trash"></span>
                                        {{--<i class="fa fa-trash" aria-hidden="true"></i> --}}
                                    </a>

                                </td>
                            </tr>
                            <tr ng-if="children_records.length == 0" ng-cloak>
                                <td colspan="12">There are no records yet.</td>
                            </tr>

                            <tr>
                                <td colspan="12" class="notification-footer">
                                    <div class="pull-right" st-pagination="" st-items-by-page="itemsByPage"></div>
                                </td>
                            </tr>
                            </tbody>

                            <tbody ng-show="isLoading">
                            <tr>
                                <td class="text-center loading"><img src="/assets/images/loading.gif"></td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="small reveal" id="editChildRecordModal" data-reveal>
                            @include('children.edit')

                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div id="deleteChildDetailsModal" class="reveal" data-reveal ng-controller="MainController">
                            <h4 class="profile-item-title">
                                Are you sure you want to delete this record? This will
                                lead to deletion of other subsequent records attached to this record.
                            </h4>

                            <div class="row form-submit-section">
                                <a ng-click="deleteChildRecord('/child/delete/' + delete_record_id)"
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