<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">@lang('users.name')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="@lang('users.name')" autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('users.email')</label>
        <div class="input-icon">
            <input type="email" value="{{ $row->email ?? '' }}" name="email" class="form-control" placeholder="@lang('users.email')">
            <span class="input-icon-addon"> <i class="fas fa-envelope"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'email'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('users.password')</label>
        <div class="input-icon">
            <input type="password" value="" name="password" class="form-control" placeholder="@lang('users.password')">
            <span class="input-icon-addon"> <i class="fas fa-lock"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label">@lang('users.image')</label>
        <input type="file" accept="image/*" name="image" class="form-control">
        @include('layouts.includes.dashboard.validation-error', ['input' => 'image'])
    </div>

    @if (isset($row) && $row->image)
        <div class="form-group mb-3">
            <img src="{{ $row->image }}" class="img-fluid <img src=" alt="" width="200px" height="200px">
        </div>
    @endif
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
</div>
