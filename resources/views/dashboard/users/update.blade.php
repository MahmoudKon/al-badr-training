<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل بيانات المستخدم </h3>
    </div>


    <form action="{{ route('dashboard.users.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.users.includes.inputs')
    </form>
</div>
