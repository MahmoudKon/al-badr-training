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

@section('js')
    <script>
        $(function() {
            let run_ajax = {abort: function() {}};
            let active_page_link = window.location.href;
            function loadTable(url = null) {
                run_ajax.abort();
                $('#load-table').parent().addClass('load');
                run_ajax = $.ajax({
                    url: url ?? window.location.href,
                    type: "GET",
                    data: {limit: $('#limit').val(), search: $('#search').val()},
                    success: function(response) {
                        $('#load-table').empty().append(response.view).parent().removeClass('load');
                        $('#show-count').text(response.count);
                    },
                    error: function(error) {
                        $('#error-alert').removeClass('d-none').find('.show-alert-message').text(error.responseJSON.message);
                    }
                });
            }

            $('body').on('click', '.pagination a.page-link', function(e) {
                e.preventDefault();
                active_page_link = $(this).attr('href');
                loadTable(active_page_link);
            });

            $('body').on('keyup', '#search', function(e) {
                loadTable();
            });

            $('body').on('change', '#limit', function(e) {
                loadTable();
            });

            $('body').on('click', '.open-modal', function(e) {
                e.preventDefault();
                $('#modal').find('.modal-body').empty();
                $.ajax({
                    url: $(this).attr('href'),
                    type: "GET",
                    success: function(response) {
                        $('#modal').modal('show').find('.modal-body').append(response);
                    },
                    error: function(error) {
                        $('#modal').modal('hide');
                        $('#error-alert').removeClass('d-none').find('.show-alert-message').text(error.responseJSON.message);
                    }
                })
            });

            $('body').on('click', '.delete-row', function(e) {
                e.preventDefault();
                if (confirm('هل انت متاكد من عملية الحذف')) $(this).closest('form').submit();
            });

            $('body').on('submit', '.submit-form', function(e) {
                e.preventDefault();
                let form = $(this);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData(form[0]),
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    beforeSend: function (jqHXR) { form.closest('.card').addClass('load').find('.error').empty(); },
                    success: function(response) {
                        $('#modal').modal('hide').find('.modal-body').empty();
                        $('#success-alert').removeClass('d-none').find('.show-alert-message').text(response.message);
                        loadTable(active_page_link);
                    },
                    error: function(jqXHR) {
                        handleErrors(jqXHR, form);
                    },
                    complete: function (jqXHR, textStatus) { form.closest('.card').removeClass('load'); }
                });
            });

            function handleErrors(jqXHR, form = null)
            {
                let ele = $('#error-alert');
                if (jqXHR.readyState == 0) return true;

                if ([401,402,403,404].includes(jqXHR.status))
                    ele.removeClass('d-none').find('.show-alert-message').text(jqXHR.responseJSON.message);

                else if (jqXHR.status == 422) { // List Validation Error
                    $.each(jqXHR.responseJSON.errors, function (key, val) {
                        val = Array.isArray(val) ? val[0] : val;
                        form.find(`#${key.replaceAll('.', '-')}_error`).text(val).fadeIn(300);
                    });
                } else if (typeof jqXHR.responseJSON !== 'undefined' && typeof jqXHR.responseJSON.line !== 'undefined') {
                    ele.removeClass('d-none').find('.show-alert-message').text('File: ' + jqXHR.responseJSON.file + ' (Line: ' + jqXHR.responseJSON.line + ')', jqXHR.responseJSON.message);
                } else {
                    ele.removeClass('d-none').find('.show-alert-message').text(jqXHR.responseJSON || jqXHR.statusText);
                    $('#load-backend-info').modal("show").find('.modal-body').empty().append(jqXHR.responseText);
                }
            }

            loadTable();
        });
    </script>
@endsection
