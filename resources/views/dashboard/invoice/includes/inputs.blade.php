
<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">client Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->client ?? '' }}" name="client" class="form-control" placeholder="client Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'client'])
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Dealing Date</label>
        <input class="form-control mb-2" placeholder="Select a date" id="datepicker-default" value="2020-06-20"/>
        <div class="input-icon mb-2">
            <input class="form-control " placeholder="Select a date" id="datepicker-icon" value="2020-06-20"/>
            <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
            </span>
        </div>

    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Invoice_ID</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->invoice_id ?? '' }}" name="invoice_id" class="form-control" placeholder="Item invoice_ID..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'invoice_id'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Item</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->item ?? '' }}" name="item" class="form-control" placeholder="Item..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'item'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Item description</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->description ?? '' }}" name="description" class="form-control" placeholder="Item description..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'description'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Item price</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->price ?? '' }}" name="price" class="form-control" placeholder="price..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'price'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Item Quantity</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->qty ?? '' }}" name="qty" class="form-control" placeholder="Item Quantity..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'qty'])
    </div>
    <div class="form-group mb-3">
        <label class="form-label required">Unit</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->unit ?? '' }}" name="unit" class="form-control" placeholder="Item unit..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'unit'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Store</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->store ?? '' }}" name="store" class="form-control" placeholder="store..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'store'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">net_invoice</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->store ?? '' }}" name="store" class="form-control" placeholder="store..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        <!-- @include('layouts.includes.dashboard.validation-error', ['input' => 'store']) -->
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Total</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->store ?? '' }}" name="store" class="form-control" placeholder="store..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        <!-- @include('layouts.includes.dashboard.validation-error', ['input' => 'store']) -->
    </div>



</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
