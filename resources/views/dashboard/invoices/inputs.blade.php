<div class="card-body">
    @csrf
    <div class="mb-3">
        <div class="form-label">اختر العميل</div>
        <select class="form-select" name="client_id[]">
            <option value="">------</option>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'client_id[]'])
    </div>

    <div class="mb-3">
        <div class="form-label">تاريخ البيع</div>
        <div class="input-icon">
            <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <rect x="4" y="5" width="16" height="16" rx="2" />
                    <line x1="16" y1="3" x2="16" y2="7" />
                    <line x1="8" y1="3" x2="8" y2="7" />
                    <line x1="4" y1="11" x2="20" y2="11" />
                    <line x1="11" y1="15" x2="12" y2="15" />
                    <line x1="12" y1="15" x2="12" y2="18" />
                </svg>
            </span>
            <input class="form-control" placeholder="Select a date" id="datepicker-icon-prepend" value="2020-06-20" />
        </div>
    </div>
    <div class="mb-3">
        <div class="form-label">الوحدة</div>
        <select class="form-select" name="unit_id[]" id="un-id">
            <option value="">------</option>
            @foreach ($units as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'client_id[]'])
    </div>
    <div class="form-group">
        <label class="form-label required">رقم الفاتورة</label>
        <div class="input-icon mb-3">
            <input type="number" value="{{ $row->name ?? '' }}" name="invoice_number[]" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'invoice_number[]'])
    </div>

    <div class="form-group">
        <label class="form-label required">الصنف</label>
        <div class="input-icon mb-3">
            <input id="item-name" type="text" value="{{ $row->name ?? '' }}" name="item[]" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'item[]'])
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea id="desc" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="12"
            name="description[]"></textarea>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'description[]'])
    </div>

    <div class="form-group">
        <label class="form-label required">السعر</label>
        <div class="input-icon mb-3">
            <input id="pri" type="number" value="{{ $row->name ?? '' }}" name="price[]" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'price[]'])
    </div>
    <div class="form-group">
        <label class="form-label required">الكمية</label>
        <div class="input-icon mb-3">
            <input id="quan" type="number" value="{{ $row->name ?? '' }}" name="quantity[]"
                class="form-control" placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'quantity[]'])
    </div>
    <div class="card-footer text-center">
        <button id="add-row-btn" class="btn btn-danger btn-larg"> اضافه صف <i class="fas fa-plus mx-2"></i> </button>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable" id="invoiceTable">
            <thead>
                <tr>
                    <th>الصنف</th>
                    <th>الوصف</th>
                    <th>الكمية</th>
                    <th>الوحدة</th>
                    <th>السعر</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

</div>
<div class="card-footer text-center">
    <button id="save-btn" type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i>
    </button>
</div>
@section('js')
    <script>
        $(document).ready(function() {
            const tbody = $('#invoiceTable tbody');
            $('#add-row-btn').click(function() {
                const newRow = $('<tr>');
                const itemRow = $('<td>').append($('#item-name').val());
                const descriptionRow = $('<td>').append($('#desc').val());
                const quantityRow = $('<td>').append($('#quan').val());
                const unitRow = $('<td>').append($('#un-id').val());
                const priceRow = $('<td>').append($('#pri').val());
                newRow.append(itemRow, descriptionRow, quantityRow, unitRow, priceRow);
                tbody.append(newRow);
            });
            $('#save-btn').click(function() {
                const rows = $('#invoiceTable tbody tr').map(function() {
                    const item = $(this).find('input[name="item[]"]').val();
                    const description = $(this).find('input[name="description[]"]').val();
                    const quantity = $(this).find('input[name="quantity[]"]').val();
                    const unit = $(this).find('input[name="unit_id[]"]').val();
                    const price = $(this).find('input[name="price[]"]').val();
                    return {
                        item: item,
                        description: description,
                        quantity: quantity,
                        unit: unit,
                        price: price
                    };
                }).get();

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(rows[0]),
                    success: function(response) {
                        console.log('Data saved successfully.');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
