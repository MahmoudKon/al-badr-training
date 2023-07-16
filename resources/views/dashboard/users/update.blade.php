<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Edit User Data </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{ routeHelper('users.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.users.includes.inputs')
    </form>
</div>
