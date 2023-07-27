<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Create New Item </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{-- routeHelper('invoice.store') --}}" class="submit-form invoice-form" method="post">
        @include('dashboard.invoice.includes.inputs')
    </form>
</div>
