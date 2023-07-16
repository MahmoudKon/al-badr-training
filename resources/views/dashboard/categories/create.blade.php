<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Create New Category </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{ routeHelper('categories.store') }}" class="submit-form" method="post">
        @include('dashboard.categories.includes.inputs')
    </form>
</div>
