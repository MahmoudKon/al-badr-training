<div class="card">
    <div class="card-header justify-content-center">
        <h3 class="card-title"> @lang('categories.show-sub-categories') </h3>
    </div>
    <div class="card-body">

        <link href="{{ asset('assets/css/tree-diagram.css') }}" rel="stylesheet" />

        <div class="tree-diagram">
            @include('dashboard.categories.tree-diagram', ['subs' => [$row]])
        </div>

    </div>
</div>
