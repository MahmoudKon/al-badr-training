<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Shop Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Shopname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required"> Address </Address></label>
        <div class="input-icon">
            <input type="text" value="{{ $row->address ?? '' }}" name="address" class="form-control" placeholder="Address...">
            <span class="input-icon-addon"> <i class="fas fa-envelope"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'address'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Phone</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->phone ?? '' }}" name="phone" class="form-control" placeholder="Phone...">
            <span class="input-icon-addon"> <i class="fas fa-lock"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'phone'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i> </button>
</div>
