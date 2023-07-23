<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">item Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="item Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-brands fa-unity"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label required">desc</label>
    <div class="input-icon">
        <input type="number" value="{{ $row->desc ?? '' }}" name="desc" class="form-control" placeholder="desc...">
        <span class="input-icon-addon"> <i class="fas fa-envelope"></i> </span>
    </div>
    @include('layouts.includes.dashboard.validation-error', ['input' => 'desc'])
</div>

<div class="form-group mb-3">
    <label class="form-label required">price</label>
    <div class="input-icon">
        <input type="number" value="{{ $row->price ?? '' }}" name="price" class="form-control" placeholder="price...">
        <span class="input-icon-addon"> <i class="fas fa-lock"></i> </span>
    </div>
    @include('layouts.includes.dashboard.validation-error', ['input' => 'price'])
</div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
