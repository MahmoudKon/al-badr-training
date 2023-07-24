

<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء مستودع جديد </h3>
    </div>

    <form action="{{ route('dashboard.stores.store') }}" class="submit-form" method="post">
        @include('dashboard.stores.includes.inputs')
    </form>
</div>
