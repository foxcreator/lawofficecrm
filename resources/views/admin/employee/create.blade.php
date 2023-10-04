@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <form class="form-horizontal" action="{{ route('admin.employee.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" value="{{ old('password') }}" placeholder="Пароль">
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

                    <div class="form-group row">
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
                                   name="name" value="{{ old('name') }}" placeholder="Ім'я">
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
                                   name="surname" value="{{ old('surname') }}" placeholder="Прізвище">
                            @error('surname')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Дата народження:</label>
                        <div class="input-group date col-sm-10" id="date">
                            <input type="date" name="birthdate"
                                   class="form-control @error('birthdate') is-invalid @enderror"
                                   value="{{ old('birthdate') }}"/>
                            @error('birthdate')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
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

                    <div class="form-group">
                        <label for="role" class="col-2 col-form-label pl-0">Роль у фирмі</label>
                        <select name="role" id="role" class="custom-select col-3 @error('role') is-invalid @enderror">
                            @foreach($roles as $key => $role)
                                <option value="{{ $key }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="customRadio1" class="col-2 @error('gender') is-invalid @enderror">Стать:</label>
                        @foreach($genders as $key => $gender)
                            <div class="custom-control custom-radio col-1">
                                <input class="custom-control-input" value="{{ $key }}" type="radio"
                                       id="gender{{ $key }}" name="gender">
                                <label for="gender{{ $key }}" class="custom-control-label">{{ $gender }}</label>
                            </div>
                        @endforeach
                        @error('gender')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('admin.employee.index') }}" type="submit" class="btn btn-default w-25">Відміна</a>
                    <button type="submit" class="btn btn-info float-right w-25">Додати працівника</button>
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

