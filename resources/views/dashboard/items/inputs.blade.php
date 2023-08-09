<div class="card-body">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.name')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->name ?? old('name') }}" name="name" class="form-control" placeholder="@lang('items.name')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.select-category')</label>
                <div class="input-icon">
                    <select name="category_id" class="form-control select2">
                        <option value="">---</option>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}" {{ isset($row) && $row->category_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'category_id'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.select-unit')</label>
                <div class="input-icon">
                    <select name="unit_id" class="form-control select2">
                        <option value="">---</option>
                        @foreach ($units as $id => $name)
                            <option value="{{ $id }}" {{ isset($row) && $row->unit_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'unit_id'])
            </div>

            @if ($row)
                @foreach ($row->stores as $item_store)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label required">@lang('items.select-store')</label>
                                <select name="stores[{{ $item_store->id }}][store_id]" class="form-control select2 stores-select">
                                    <option value="">---</option>
                                    @foreach ($stores as $id => $name)
                                        <option value="{{ $id }}" data-qty="{{ $row->stores->where('id', $id)->first()->pivot->quantity ?? 0 }}" {{ isset($row) && $item_store->id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.includes.dashboard.validation-error', ['input' => "stores.$item_store->id.store_id"])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label required">@lang('items.quantity')</label>
                                <div class="input-icon">
                                    <input type="text" value="" name="stores[{{ $item_store->id }}][quantity]" class="form-control store-qty" placeholder="@lang('items.quantity')" autofocus>
                                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                                </div>
                                @include('layouts.includes.dashboard.validation-error', ['input' => "stores.$item_store->id.quantity"])
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @if (count($stores) == 0)
                <div class="form-group mb-3">
                    <a href='{{ routeHelper('stores.create') }}' target="_blank" class="btn btn-sm btn-danger">There are no stores</a>
                    @include('layouts.includes.dashboard.validation-error', ['input' => "stores.$i.store_id"])
                </div>
            @endif

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.sale_price')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->sale_price ?? old('sale_price') }}" name="sale_price" class="form-control" placeholder="@lang('items.sale_price')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'sale_price'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.pay_price')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->pay_price ?? old('pay_price') }}" name="pay_price" class="form-control" placeholder="@lang('items.pay_price')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'pay_price'])
            </div>

            <div class="form-group mb-3">
                <label class="required cursor-pointer" for="is_active">@lang('items.show-in-sales')</label>
                <label class="form-switch">
                    <input class="form-check-input cursor-pointer" name="is_active" id="is_active" value="1" type="checkbox" @checked((isset($row) && $row->is_active) || (! isset($row) && true))>
                </label>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'is_active'])
            </div>
        </div>


        <div class="col-md-8">
            <div class="form-group mb-3">
                <label class="form-label">@lang('items.desc')</label>
                <textarea name="desc" class="form-control" placeholder="@lang('items.desc')" rows="10">{{ $row->desc ?? old('desc') }}</textarea>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'desc'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label">@lang('items.image')</label>
                <input type="file" accept="image/*" name="image" class="form-control">
                @include('layouts.includes.dashboard.validation-error', ['input' => 'image'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.barcode')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->barcode ?? old('barcode', $barcode) }}" name="barcode" class="form-control" placeholder="@lang('items.barcode')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'barcode'])
            </div>
        </div>
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
</div>

@push('js')
    <script>
        $(function() {
            $('body').on('change', '.stores-select', function() {
                let qty = $(this).find('option:selected').data('qty');
                $(this).closest('.row').find('input.store-qty').val(qty);
            });

            $('.stores-select').change();
        });
    </script>
@endpush
