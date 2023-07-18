<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل وحدات المستخدم </h3>
    </div>


    <form action="{{ routeHelper('units.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.units.includes.inputs')
    </form>
</div>
