
@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">   تم تعديل المؤسسة  </h3>
    </div>


    <form action="{{ route('shops.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.shops.includes.inputs')
    </form>
</div>
@endsection