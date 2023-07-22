@forelse ($rows as $row)
    <tr>
        <td>
            <label class="form-check form-check-single form-switch cursor-pointer p-0">
                <input class="form-check-input cursor-pointer m-0 align-middle row-checkbox" value="{{ $row->id }}" type="checkbox">
            </label>
        </td>
        <td> {{ $row->id }} </td>
        <td> {{ $row->name }} </td>
        <td> {{ $row->email }} </td>
        <td>
<<<<<<< HEAD
            <a href="{{ route('dashboard.users.edit', $row) }}" class="btn btn-sm btn-primary">
=======
            <a href="{{ routeHelper('users.edit', $row) }}" class="btn btn-sm btn-primary open-modal">
>>>>>>> d4c9bab4edcd38e394e222098de75ad24d61cf4c
                Edit
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <form action="{{ routeHelper('users.destroy', $row) }}" method="post" class="submit-form">
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
