@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">#</th>
                        <th>@lang('items.name')</th>
                        <th>@lang('stores.name')</th>
                        <th>Qty</th>
                        <th>Old Qty</th>
                        <th>Current Qty</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Creator</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $row)
                        <tr>
                            <td class="w-1">{{ $loop->iteration }}</td>
                            <th>{{ $row->item->name }}</th>
                            <th>{{ $row->store->name }}</th>
                            <th>{{ $row->qty }}</th>
                            <th>{{ $row->old_qty }}</th>
                            <th>{{ $row->current_qty }}</th>
                            <th>{{ $row->price }}</th>
                            <th>{{ $row->price * $row->current_qty }}</th>
                            <th>{{ $row->user->name }}</th>
                            <th>{{ $row->created_at }}</th>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
