<div class="card-body">
    @csrf

<div class="form-group mb-3">
    <label class="form-label required">Client Name</label>
    <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Client Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-brands fa-unity"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label required">Phone</label>
    <div class="input-icon">
        <input type="text" value="{{ $row->phone ?? '' }}" name="phone" class="form-control" placeholder="Phone..." autofocus>
        <span class="input-icon-addon"> <i class="fa-solid fa-phone"></i> </span>
    </div>
    @include('layouts.includes.dashboard.validation-error', ['input' => 'phone'])
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
