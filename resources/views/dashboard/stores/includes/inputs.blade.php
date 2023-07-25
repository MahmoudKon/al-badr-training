<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Store Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Store Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Select Shop</label>
        <div class="input-icon">
            <select name="shop_id" class="form-control select2">
                <option value="">---</option>
                @foreach ($shops as $id => $name)
                    <option value="{{ $id }}" {{ isset($row) && $row->shop_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'shop_id'])
    </div>


</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
