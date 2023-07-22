@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <ul>
            @include('dashboard.categories.subs', ['rows' => $rows, 'padding' => 2])
        </ul>

    </div>
@endsection
