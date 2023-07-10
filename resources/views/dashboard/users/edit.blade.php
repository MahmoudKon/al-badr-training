<div class="modal modal-blur fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.users.update', ['id' => $user->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title">اضافة مستخدم جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name }}" name="name" placeholder="اسم المستخدم">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الالكتروني</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email }}" name="email" placeholder="البريد الالكتروني">
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
                        <a class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            الفاء
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            تأكيد
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
