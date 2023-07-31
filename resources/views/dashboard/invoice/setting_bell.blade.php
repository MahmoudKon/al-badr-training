@extends('layouts.dashboard')

@section('content')
<form action="{{ routeHelper('invoice.setting.store') }}" class="submit-form invoice-form" method="post">
{{ csrf_field() }}
    @foreach($result as $key=>$value)

        <div class="card">
            <div class="card-header  bg-success">
                <h3 class="card-title">{{__('invoice.'.$key)}}</h3>
            </div>

            <div class="card-body">
                @foreach($value as $k=>$val)
                <div class="list-group list-group-flush">
                    <div class="form-label ">{{__('invoice.'.$k)}}</div>
                    <div class="list-group-item list-group-item-action">
                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="1" name="{{$k}}" <?php if($val==1){echo "checked";}?>>
                        <span class="form-check-label">{{__('invoice.yes')}}</span>
                        </label>

                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="0" name="{{$k}}" <?php if($val==0){echo "checked";}?>>
                        <span class="form-check-label">{{__('invoice.no')}}</span>
                        </label>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

    @endforeach
    <div class="card-footer text-center">
            <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(function() {
            $('body').on('change', '.change-status', function() {
                $(this).closest('form').submit();
            });

        });

    </script>
@endsection
