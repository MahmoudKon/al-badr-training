<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Unit Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Unit Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-brands fa-unity"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
