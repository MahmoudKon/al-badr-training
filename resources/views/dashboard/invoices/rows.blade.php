@forelse ($rows as $row)
    <tr>
        <td>
            <label class="form-check form-check-single form-switch cursor-pointer p-0">
                <input class="form-check-input cursor-pointer m-0 align-middle row-checkbox" value="{{ $row->id }}" type="checkbox">
            </label>
        </td>
        <td> {{ $loop->iteration }} </td>
        <td> {{ $row->bill_date }} </td>
        <td> {{ $row->client->name }} </td>
        <td> {{ $row->user->name }} </td>
        <td> {{ $row->total }} </td>
        <td>
            @include('dashboard.includes.buttons.edit',  ['id' => $row->id])
        </td>
        <td>
            @include('dashboard.includes.buttons.delete',  ['id' => $row->id])
        </td>
    </tr>
@empty
    <tr>
        <td colspan="10" class="text-center"> <b> @lang('datatable.zeroRecords') </b> </td>
    </tr>
@endforelse

<tr>
    <td colspan="10"> {{ $rows->links() }} </td>
</tr>
