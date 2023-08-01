<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label required">
                    @lang('clients.name')
                    <a href="{{ routeHelper('clients.create') }}" class="btn btn-sm btn-primary open-modal float-end"> <i class="fas fa-plus"></i> </a>
                </label>
                <select name="client_id" id="clients" class="form-control select2">
                    <option value="">---</option>
                    @foreach ($clients as $id => $name)
                        <option value="{{ $id }}" {{ isset($row) && $row->client_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @include('layouts.includes.dashboard.validation-error', ['input' => "client_id"])
            </div>
        </div>
    </div>


    <div class="">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label required"> @lang('items.name') </label>
                <input type="search" id="item_name" class="form-control">
                <input type="hidden" list="items">
                <datalist id="items"></datalist>
            </div>
        </div>
    </div>



</div>

@push('js')
    <script>
        $(function() {
            let ajax_request = {abort: function() {}};
            $('#item_name').on('keyup', function() {
                ajax_request.abort();

                ajax_request = $.ajax({
                    url: "{{ routeHelper('invoices.items.list') }}",
                    type: "GET",
                    data: {store_id: 0, name: $(this).val()},
                    success: function(response) {
                        $('#items').empty().show();
                        $.each(response, function(key, val) {
                            $('#items').append(`<option class="selected-item" value="${val}" data-id="${key}">`);
                        });
                    }
                });
            });

            $('body').on('click', '.selected-item', function() {
                $('#item_name').val('');
                let item_name = $(this).value();
                let item_id = $(this).data('id');
                $.ajax({
                    url: "{{ routeHelper('invoices.items.details') }}",
                    type: "GET",
                    data: {item_id: item_id},
                    success: function(response) {
                        console.log(response);
                    }
                });
            })
        });
    </script>
@endpush
