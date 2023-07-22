@foreach ($rows as $row)
<li style="padding: 0 {{ $padding }}px">
    {{ $row->name }}
        <ul>
            @include('dashboard.categories.subs', ['rows' => $row->subs, 'padding' => $padding * 5])
        </ul>
    </li>
    @endforeach