@extends('layouts.dashboard')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        المتاجر
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">بيانات المتاجر</h3>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="8" size="3"
                                aria-label="Invoices count">
                        </div>
                        entries
                    </div>
                    <div class="ms-auto text-muted">
                        بحث:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
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
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                    aria-label="Select invoice"></td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>3</td>
                            <td>
                                <span class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                        data-bs-toggle="dropdown">العمليات</button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('dashboard.shops.edit', ['shop' => 1]) }}">
                                            تعديل
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('dashboard.shops.destroy', ['shop' => 1]) }}">
                                            حذف
                                        </a>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
