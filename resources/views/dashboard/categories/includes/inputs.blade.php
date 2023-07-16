<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Category Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Category Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Select Parent</label>
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
        <label class="required cursor-pointer" for="is_show">Show Category Items</label>
        <label class="form-switch">
            <input class="form-check-input cursor-pointer" name="is_show" id="is_show" value="1" type="checkbox" @checked(isset($row) && $row->is_show)>
        </label>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'is_show'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
