<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء وحدة جديد </h3>
    </div>

    <form action="{{ route('dashboard.units.store') }}" class="submit-form" method="post">
        @include('dashboard.units.includes.inputs')
    </form>
</div>
