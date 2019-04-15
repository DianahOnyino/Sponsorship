@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="MainController">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection