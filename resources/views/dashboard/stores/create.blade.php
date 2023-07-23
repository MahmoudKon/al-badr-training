<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء مخزن جديد</h3>
    </div>


    <form action="{{ routeHelper('stores.store') }}" class="submit-form" method="post">
        @include('dashboard.stores.includes.inputs')
    </form>
</div>
