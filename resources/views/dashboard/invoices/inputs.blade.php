<div class="card-body">
    @csrf
    <div class="mb-3">
        <div class="form-label">اختر العميل</div>
        <select class="form-select" id="client_id">
            <option value="">------</option>
            @foreach ($clients as $id => $name)
                <option data-id="{{ $id }}" value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'client_id[]']) --}}
    </div>

    {{-- <div class="mb-3">
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
    </div> --}}

    <div class="mb-3">
        <div class="form-label">الوحدة</div>
        <select class="form-select" " id="unit_id">
            <option value="">------</option>
                                       @foreach ($units as $id=> $name)
            <option data-id="{{ $id }}" data-name="{{ $name }}" value="{{ $id }}">
                {{ $name }}</option>
            @endforeach
        </select>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'client_id[]']) --}}
    </div>
    <div class="form-group">
        <label class="form-label required">رقم الفاتورة</label>
        <div class="input-icon mb-3">
            <input type="number" value="{{ $row->name ?? '' }}" id="invoice-number" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'invoice_number[]']) --}}
    </div>

    <div class="form-group">
        <label class="form-label required">الصنف</label>
        <div class="input-icon mb-3">
            <input id="item-name" type="text" value="{{ $row->name ?? '' }}" id="item" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'item[]']) --}}
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea id="description" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="12"></textarea>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'description[]']) --}}
    </div>

    <div class="form-group">
        <label class="form-label required">السعر</label>
        <div class="input-icon mb-3">
            <input id="price" type="number" value="{{ $row->name ?? '' }}" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'price[]']) --}}
    </div>
    <div class="form-group">
        <label class="form-label required">الكمية</label>
        <div class="input-icon mb-3">
            <input id="quantity" type="number" value="{{ $row->name ?? '' }}" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        {{-- @include('layouts.includes.dashboard.validation-error', ['input' => 'quantity[]']) --}}
    </div>
    <div class="card-footer text-center">
        <a href="javascript:;" id="add-row" class="btn btn-danger btn-larg"> اضافه صف <i class="fas fa-plus mx-2"></i>
        </a>
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
                    <th>@lang('buttons.delete')</th>
                </tr>
            </thead>
            <tbody id="invoice-rows">
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
        $("#add-row").on('click', function() {
            var client_id = $('#client_id').find("option:selected").data('id');
            var unit_id = $('#unit_id').find("option:selected").data('id');
            var deleteId = "removeRow" + unit_id;
            var unit_name = $('#unit_id').find("option:selected").data('name');
            var trId = "tr" + unit_id;
            var item = $('#item').val();
            var quantity = $('#quantity').val();
            var invoiceNumber = $('#invoice-number').val();
            var description = $('#description').val();
            var price = $('#price').val();
            $("tbody").append(
                '<tr id="' + trId + '">' +
                '<td>' + item + '</td>' +
                '<td>' + description + '</td>' +
                '<td> <input type="text" name="units[]" value="' + unit_id + '" /> </td>' +
                '<td>' + unit_name + '</td>' +
                '<td>' + price + '</td>' +
                '<td>' +
                '<a href="javascript:;" id="' + deleteId + '" data-id="' + unit_id + '"data-price="' +
                '" class="removeRow btn btn-danger waves-effect waves-light btn-xs m-b-5">' +
                '@lang('buttons.delete')' + '</a>' + '</td>' +
                '<input type="hidden" name="units[]" value="' + unit_id + '" />' +
                '<input type="hidden" name="prices[]" value="' + price + '" />' +
                '<input type="hidden" name="description[]" value="' + description + '" />' +
                '<input type="hidden" name="invoice[]" value="' + invoiceNumber + '" />' +

                '</td>' +
                "</tr>"
            );

            $('#client_id').prop('selectedIndex', 0);
            $('#unit_id').prop('selectedIndex', 0);
            $('#price').val("");
            $('#item').val("");
            $('#price').val("");
            $('#quantity').val(0);


        });

        $('body').on('click', '.removeRow', function() {
            var id = $(this).attr('data-id');
            var tr = $(this).closest($('#removeRow' + id).parent().parent());
            tr.find('td').fadeOut(500, function() {
                tr.remove();
            });
        });
    </script>
@endsection
