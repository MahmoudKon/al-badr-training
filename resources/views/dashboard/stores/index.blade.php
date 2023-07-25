@extends('layouts.dashboard')

@section('content')
    <div class="card">
        @include('dashboard.includes.card-header')

        @include('dashboard.includes.filter')

        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">
                            <label class="form-check form-check-single form-switch cursor-pointer p-0">
                                <input class="form-check-input cursor-pointer m-0 align-middle" id="check-all-rows" type="checkbox">
                            </label>
                        </th>
                        <th class="w-1">No.</th>
                        <th>Name</th>
                        <th>Shop</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="load-table"></tbody>
            </table>
        </div>
    </div>
@endsection
