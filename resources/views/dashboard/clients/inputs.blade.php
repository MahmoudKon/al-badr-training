<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">@lang('clients.name')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="@lang('clients.name')" autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('clients.phone')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->phone ?? '' }}" name="phone" class="form-control" placeholder="@lang('clients.phone')">
            <span class="input-icon-addon"> <i class="fa-solid fa-phone"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'phone'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('clients.balance')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->balance ?? '' }}" name="balance" class="form-control" placeholder="@lang('clients.balance')">
            <span class="input-icon-addon"> <i class="fa-solid fa-balance-scale"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'balance'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
</div>
