@error($input)
    <span class="text-danger error"> <strong>{{ $message }}</strong> </span>
@enderror

@if ($input)
    <strong class="text-danger error" id="{{ $input }}_error"></strong>
@endif
