@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">Children Records</div>

                    <div class="card-body">
                        @include('partials._base_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection