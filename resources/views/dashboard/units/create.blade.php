<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء وحده جديده</h3>
    </div>


    <form action="{{ routeHelper('units.store') }}" class="submit-form" method="post">
        @include('dashboard.units.includes.inputs')
    </form>
</div>
