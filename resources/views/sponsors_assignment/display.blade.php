@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="ChildSponsorController">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Sponsor-Child Assignment Records
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{!! route('sponsor-assign') !!}">
                            @csrf
                            <div class="grid-x">
                                <div class="cell large-4 medium-4 small-12">
                                    <select name="child_id" id="child_id" class="form-control">
                                        @foreach(childrenArray() as $value => $child)
                                            <option value="{{ $value }}">{{ $child }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="cell large-1 medium-1 small-12">
                                </div>

                                <div class="cell large-4 medium-4 small-12">
                                    <select name="sponsor_id" id="sponsor_id" class="form-control">
                                        @foreach(sponsorsArray() as $value => $sponsor)
                                            <option value="{{ $value }}">{{ $sponsor }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="cell large-1 medium-1 small-12">
                                </div>

                                <div class="cell large-2 medium-2 small-12">
                                    <button type="submit"
                                            style="padding: 6px !important;"
                                            class="btn btn-primary px4 padded-botton form-submit-section">
                                        Assign
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div>
                            <table st-pipe="callServer" st-table="children_sponsors_records" class="table responsive
                            table-scroll">
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
                                    <td>Sponsor</td>
                                    <td>Child</td>
                                    <td>Date Assigned</td>
                                    <td>Assigned By</td>
                                </tr>
                                </thead>
                                <tbody ng-show="!isLoading">
                                <tr ng-if="children_sponsors_records.length != 0"
                                    ng-repeat="child_sponsor in children_sponsors_records track by $index" ng-cloak>
                                    <td><% $index+1 %></td>
                                    <td><% child_sponsor.sponsor %></td>
                                    <td><% child_sponsor.child %></td>
                                    <td><% child_sponsor.date_assigned %></td>
                                    <td><% child_sponsor.assigned_by %></td>
                                </tr>
                                <tr ng-if="children_sponsors_records.length == 0" ng-cloak>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection