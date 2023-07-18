@foreach ($rows as $row)
    <tr>
        <td> <input class="form-check-input cursor-pointer m-0 align-middle row-checkbox" value="{{ $row->id }}"
                type="checkbox">
        </td>
        <td> {{ $loop->iteration }} </td>
        <td> {{ $row->name }} </td>
        <td>{{ $row->parent->name ?? 'قسم رئيسي' }}</td>
        <td>
            <a href="{{ routeHelper('categories.edit', $row) }}" class="btn btn-sm btn-primary open-modal">
                تعديل
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <form action="{{ routeHelper('categories.destroy', $row) }}" method="post" class="submit-form">
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
