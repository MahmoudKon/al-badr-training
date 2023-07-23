<div class="card-body">
    @csrf
    <div class="form-group">
        <label class="form-label required">Item Name</label>
        <div class="input-icon mb-3">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control"
                placeholder="Itemname..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
    <div class="mb-3">
        <div class="form-label">Store Name</div>
        <select class="form-select" name="store_id">
            @foreach ($stores as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->store_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'store_id'])
    </div>
    <div class="mb-3">
        <div class="form-label">Select Category</div>
        <select class="form-select" name="category_id">
            @foreach ($categories as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->category_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'category_id'])
    </div>
    <div class="mb-3">
        <div class="form-label">Select Unit</div>
        <select class="form-select" name="unit_id">
            @foreach ($units as $id => $name)
                <option value="{{ $id }}" {{ isset($row) && $row->unit_id == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'unit_id'])
    </div>
    <div class="form-group">
        <label class="form-label required">Price</label>
        <div class="input-icon mb-3">
            <input type="number" value="{{ $row->name ?? '' }}" name="price" class="form-control"
                placeholder="Itemprice..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'price'])
    </div>
    <div class="form-group">
        <label class="form-label required">Quantity</label>
        <div class="input-icon mb-3">
            <input type="number" value="{{ $row->name ?? '' }}" name="quantity" class="form-control"
                placeholder="Itemquantity..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'quantity'])
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" cols="12" name="description"></textarea>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'description'])
    </div>
</div>
<div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i> </button>
</div>
