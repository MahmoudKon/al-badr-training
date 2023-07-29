
<div class="card-body">
    @csrf
    <!--Items Informations-->
    <div class="form-group mb-3">
        <label class="form-label required">Item Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Item Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
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
            <input type="text" value="{{ $row->price ?? '' }}" name="price" class="form-control" placeholder="Item price..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'price'])
    </div>



    <div class="form-group mb-3">
        <label class="form-label required">Select Unit</label>
        <div class="input-icon">
            <select name="unit_id" class="form-control select2">
                <option value="">---</option>
                @foreach ($units as $id => $name)
                    <option value="{{ $id }}" {{ isset($row) && $row->unit_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'unit_id'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Select Category</label>
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
        <label class="required cursor-pointer" for="is_active">Activate Items</label>
        <label class="form-switch">
            <input class="form-check-input cursor-pointer" name="is_active" id="is_active" value="1" type="checkbox" @checked(isset($row) && $row->is_active)>
        </label>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'is_active'])
    </div>
    <!--End Items Informations-->

    <!--Items Relation to stores-->
    <div class="form-group mb-3">
        <label class="form-label required">Select Store</label>
        <div class="input-icon">
            <select name="store_id[]" class="form-control select2" multiple>
                <option value="">---</option>
                @foreach ($stores as $id => $name)
                    <option value="{{ $id }}" {{ isset($row) && $row->store_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'store_id'])
    </div>
    <div class="form-group mb-3">
        <label class="form-label required">Item Quantity in store</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->quantity ?? '' }}" name="quantity" class="form-control" placeholder="Item quantity..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'quantity'])
    </div>
    <!--End Items Relation to stores-->
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
