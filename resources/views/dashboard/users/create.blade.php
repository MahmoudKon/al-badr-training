<div class="modal modal-blur fade" id="new-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.users.store') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-header">
                    <h5 class="modal-title">اضافة مستخدم جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" name="name" placeholder="اسم المستخدم">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الالكتروني</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" name="email" placeholder="البريد الالكتروني">
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
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            مستخدم جديد
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
