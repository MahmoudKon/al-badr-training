<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New Client</h3>
    </div>


    <form action="{{ routeHelper('clients.store') }}" class="submit-form" method="post">
        @include('dashboard.clients.includes.inputs')
    </form>
</div>
