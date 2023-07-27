@extends('layouts.dashboard')

@section('content')
    <div class="card">

        <div class="tree-diagram">
            <ul>
                @foreach($categories as $category)
                    <li class='tree-diagram__root'>{{$category->name}}</li>
                    @if($category->subs->count())

                        @include('dashboard.categories.tree',[ 'categories'=> [$category->subs] ])

                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
