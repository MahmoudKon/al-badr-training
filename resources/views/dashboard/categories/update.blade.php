<div class="card">
    <div class="card-header">
        <h3 class="card-title"> تعديل فئه  </h3>
    </div>


    <form action="{{ route('dashboard.categories.update', $row) }}" class="submit-form" method="post">
        @method('PUT')
        @include('dashboard.categories.includes.inputs')
    </form>
</div>
