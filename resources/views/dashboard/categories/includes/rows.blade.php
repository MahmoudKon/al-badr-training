@foreach ($rows as $row)
    <tr>
        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
        <td> {{ $row->id }} </td>
        <td> {{ $row->name }} </td>
        <td>
            <a href="{{ route('dashboard.categories.edit', $row) }}" class="btn btn-sm btn-primary open-modal">
                تعديل
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <form action="{{ route('dashboard.categories.destroy', $row) }}" method="post" class="submit-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger delete-row">
                    حذف
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach

<tr>
    <td colspan="10"> {{ $rows->links() }} </td>
</tr>
