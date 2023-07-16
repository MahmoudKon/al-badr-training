<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Category Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="CategoryName..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i> </button>
</div>
