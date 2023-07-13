<div class="card">
    <div class="card-header">
        <h3 class="card-title"> انشاء مستخدم جديد </h3>
    </div>


    <form action="{{ route('dashboard.users.store') }}" class="submit-form" method="post">
        @include('dashboard.users.includes.inputs')
    </form>
</div>
