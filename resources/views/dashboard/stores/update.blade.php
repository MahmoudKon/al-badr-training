<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل وحده المستخدم </h3>
    </div>


    <form action="{{ route('dashboard.stores.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.stores.includes.inputs')
    </form>
</div>
