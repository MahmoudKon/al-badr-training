<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل وحده المستخدم </h3>
    </div>


    <form action="{{ route('dashboard.clients.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.clients.includes.inputs')
    </form>
</div>
