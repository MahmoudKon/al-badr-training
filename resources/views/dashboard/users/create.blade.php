<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title"> Create New User </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{ routeHelper('users.store') }}" class="submit-form" method="post">
        @include('dashboard.users.includes.inputs')
    </form>
</div>
