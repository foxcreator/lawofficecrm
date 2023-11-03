@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <form class="form-horizontal" action="{{ route('admin.employee.update', $user->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email"
                                   name="email" value="{{ $user->email }}" placeholder="Email" disabled>
                            @error('email')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="border-bottom mb-2">
                        <h4>Зміна пароля</h4>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Новий пароль</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" value="{{ old('password') }}" placeholder="Новий пароль">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                            data-target="password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row border-bottom pb-2">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Підтвердить пароль</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password"
                                       class="form-control @error('confirmPassword') is-invalid @enderror"
                                       id="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}"
                                       placeholder="Підтвердить пароль">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                            data-target="confirmPassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('confirmPassword')
                                <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Ім'я</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ $user->name }}" placeholder="Ім'я" disabled>
                            @error('name')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Прізвище</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                                   name="surname" value="{{ $user->surname }}" placeholder="Прізвище" disabled>
                            @error('surname')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Змінити телефон</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{ old('phone') }}" placeholder="+3(099)1234567">
                            @error('phone')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if($user->hasRole('advocate'))
                    <div class="line"></div>
                    <div class="form-group row">
                        <label for="license_number" class="col-sm-2 col-form-label">Номер свідотства</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('license_number') is-invalid @enderror"
                                   id="license_number"
                                   name="license_number" value="{{ $user->license_number }}"
                                   placeholder="Обов'язково для ролі адвокат"
                                   disabled
                            >
                            @error('license_number')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="license_issued_by" class="col-sm-2 col-form-label">Кім видано свідотство</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('license_issued_by') is-invalid @enderror"
                                   id="license_issued_by"
                                   name="license_issued_by" value="{{ $user->license_issued_by }}"
                                   placeholder="Обов'язково для ролі адвокат"
                                   disabled
                            >
                            @error('license_issued_by')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Коли видано:</label>
                        <div class="input-group date col-sm-10" id="date">
                            <input type="date" name="license_when_issued"
                                   class="form-control @error('license_when_issued') is-invalid @enderror"
                                   value="{{ $user->license_when_issued }}"
                                   disabled
                            >
                            @error('license_when_issued')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="line"></div>
                    @endif

                    <div class="form-group">
                        <label for="role" class="col-2 col-form-label pl-0">Роль у компанії</label>
                        <select name="role" id="role" class="custom-select col-3 @error('role') is-invalid @enderror">
                            @if($user->getRoleNames()->first())
                            <option value="{{ $user->getRoleNames()->first() }}">
                                {{ \App\Models\User::$roleMappings[$user->getRoleNames()->first()] }}
                            </option>
                            @endif
                            @foreach(\App\Models\User::$roleMappings as $key => $role)
                                <option value="{{ $key }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('admin.employee.index') }}" type="submit" class="btn btn-default w-25">Відміна</a>
                    <button type="submit" class="btn btn-info float-right w-25">Змінити дані</button>
                </div>
                <!-- /.card-footer -->
            </form>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle-password').click(function () {
                var targetId = $(this).data('target');
                var passwordField = $('#' + targetId);
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });
        });
    </script>

@endsection

