@extends('layouts.dashboard')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        المستخدمين
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="card-title btn btn-primary" class="btn" data-bs-toggle="modal" data-bs-target="#new-user">
                    اضافه مستخدم
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</a>
                                </td>
                                <td>
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">العمليات</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $user->id }}">
                                                تعديل
                                            </a>
                                            <a class="dropdown-item" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $user->id }}">
                                                حذف
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            {{-- Delete User --}}
                            @include('dashboard.users.delete')
                            {{-- Update User --}}
                            @include('dashboard.users.edit')
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- New User --}}
    @include('dashboard.users.create')
@endsection
