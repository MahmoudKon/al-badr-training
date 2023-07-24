@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title">
                Show {{ last( explode('/', request()->url()) ) }}
                <span id="show-count"></span>
            </h3>
            <a href="{{ route('dashboard.'.last( explode('/', request()->url()) ).'.create') }}" class="btn btn-sm btn-primary open-modal float-left">انشاء وحدة <i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="text-muted">
                    Show
                    <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="8" id="limit" size="3"
                            aria-label="Invoices count">
                    </div>
                    entries
                </div>
                <div class="ms-auto text-muted">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" id="search" aria-label="Search invoice">
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                aria-label="Select all invoices"></th>
                        <th class="w-1">No.</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="load-table"></tbody>
            </table>
        </div>
    </div>
@endsection


