<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء عنصر جديد</h3>
    </div>


    <form action="{{ routeHelper('items.store') }}" class="submit-form" method="post">
        @include('dashboard.items.includes.inputs')
    </form>
</div>
