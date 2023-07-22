@forelse ($rows as $row)
    <tr>
        <td>
            <label class="form-check form-check-single form-switch cursor-pointer p-0">
                <input class="form-check-input cursor-pointer m-0 align-middle row-checkbox" value="{{ $row->id }}" type="checkbox">
            </label>
        </td>
        <td> {{ $row->id }} </td>
        <td> {{ $row->name }} </td>
        <td>
            <form method="post" action="{{ routeHelper('categories.toggle.status', $row) }}" class="submit-form">
                @csrf

                <label class="form-check form-check-single form-switch cursor-pointer">
                    <input class="form-check-input cursor-pointer change-status" type="checkbox" @checked($row->is_show)>
                </label>
            </form>
        </td>
        <td>
            <a href="{{ routeHelper('categories.edit', $row) }}" class="btn btn-sm btn-primary open-modal">
                Edit
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <form action="{{ routeHelper('categories.destroy', $row) }}" method="post" class="submit-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger delete-row">
                    Delete
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="10" class="text-center"> <b> No Data Matched... </b> </td>
    </tr>
@endforelse

<tr>
    <td colspan="10"> {{ $rows->links() }} </td>
</tr>
