<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Edit Client Data </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{ routeHelper('client.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.client.includes.inputs')
    </form>
</div>
