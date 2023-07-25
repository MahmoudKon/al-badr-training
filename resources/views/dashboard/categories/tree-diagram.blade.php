<ul>
    @foreach ($subs as $sub)
        <li class="{{ $sub->id == request()->route('category') ? 'tree-diagram__root' : '' }}">
            <span>{{ $sub->name }}</span>
            @if ( $sub->subs->count() )
                @include('dashboard.categories.tree-diagram', ['subs' => $sub->subs])
            @endif
        </li>
    @endforeach
</ul>
