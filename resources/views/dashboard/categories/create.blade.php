<div class="card">
    <div class="card-header">
        <h3 class="card-title"> اضافه فئه جديده </h3>
    </div>

    <form action="{{ route('dashboard.categories.store') }}" class="submit-form" method="post">
        @include('dashboard.categories.includes.inputs')
    </form>
</div>
