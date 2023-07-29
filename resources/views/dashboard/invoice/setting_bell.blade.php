@extends('layouts.dashboard')

@section('content')

    @foreach($result as $key=>$value)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$key}} Controls setting</h3>
            </div>

            <div class="card-body">
                @foreach($value as $k=>$val)
                <div class="list-group list-group-flush">
                    <div class="form-label ">{{$k}}</div>
                    <div class="list-group-item list-group-item-action">
                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$k}}" <?php if($val==1){echo "checked";}?>>
                        <span class="form-check-label">Yes</span>
                        </label>

                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$k}}" <?php if($val==0){echo "checked";}?>>
                        <span class="form-check-label">No</span>
                        </label>

                    </div>
                </div>
                @endforeach
            </div>
        </div>


    @endforeach

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
