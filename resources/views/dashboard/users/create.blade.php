<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create New User</h3>
    </div>

    <div class="card-body">
        @if (isset($user))
        <form action="{{ route('dashboard.users.update', $user) }}" class="submitForm" method="put">
            @method('put')
        @else
        <form action="{{ route('dashboard.users.store') }}" id="form" method="post">
        @endif
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">اضافة مستخدم جديد</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name ?? old('name') }}" name="name" placeholder="اسم المستخدم">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الالكتروني</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email ?? old('email') }}" name="email" placeholder="البريد الالكتروني">
                        @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password') }}" name="password" placeholder="كلمة المرور">
                        @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            value="{{ old('password_confirmation') }}" name="password_confirmation"
                            placeholder="تأكيد كلمة المرور">
                        @error('password_confirmation')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-link link-secondary">
                            الفاء
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            مستخدم جديد
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>