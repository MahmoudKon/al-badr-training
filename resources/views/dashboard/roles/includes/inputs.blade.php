<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">Role Name</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="Role Name..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">


        <div class="form-label">User's Permissions</div>
        <div>
            @foreach(Config('global.permissions') as $name => $value)
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$name}}">
                <span class="form-check-label">{{$value}}</span>
                </label>
            @endforeach

        </div>

        @include('layouts.includes.dashboard.validation-error', ['input' => 'permissions'])
    </div>


</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
