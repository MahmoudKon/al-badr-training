<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Store Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Store Name..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-store"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
</div>
