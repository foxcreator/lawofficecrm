@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <form class="form" action="{{ route('visitors.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="visitor_status" class="col-2 col-form-label pl-0">Статус</label>
                        <select name="visitor_status" id="visitor_status" class="custom-select col-3 @error('visitor_status') is-invalid @enderror">
                            @foreach($status as $key => $stat)
                                <option value="{{ $key }}" @if(old('visitor_status') == $key) selected @endif>{{ $stat }}</option>
                            @endforeach
                        </select>
                        @error('visitor_status')
                        <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
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
                        <label for="surname" class="col-sm-2 col-form-label">Прізвище</label>
                        <div class="col-sm-4">
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
                        <label for="name" class="col-sm-2 col-form-label">Ім'я</label>
                        <div class="col-sm-4">
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
                        <label for="father_name" class="col-sm-2 col-form-label">По-батькові</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name"
                                   name="father_name" value="{{ old('father_name') }}" placeholder="По-батькові">
                            @error('father_name')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Дата народження:</label>
                        <div class="input-group date col-sm-2" id="date">
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
                        <div class="col-sm-2">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{ old('phone') }}" placeholder="+3(099)1234567">
                            @error('phone')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row additional-fields">
                        <label for="tin_code" class="col-sm-2 col-form-label">ІПН</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control @error('tin_code') is-invalid @enderror" id="tin_code"
                                   name="tin_code" value="{{ old('tin_code') }}" placeholder="1112223344" maxlength="10">
                            @error('tin_code')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row additional-fields">
                        <label for="passport_number" class="col-sm-2 col-form-label">Номер паспорта</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number"
                                   name="passport_number" value="{{ old('passport_number') }}" placeholder="Номер паспорта" maxlength="10">
                            @error('passport_number')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row additional-fields">
                        <label for="passport_issued_by" class="col-sm-2 col-form-label">Ким виданий</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('passport_issued_by') is-invalid @enderror" id="passport_issued_by"
                                   name="passport_issued_by" value="{{ old('passport_issued_by') }}" placeholder="Кім виданий">
                            @error('passport_issued_by')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row additional-fields">
                        <label class="col-sm-2 col-form-label">Дата видачі:</label>
                        <div class="input-group date col-sm-2" id="passport_when_issued">
                            <input type="date" name="passport_when_issued"
                                   class="form-control @error('passport_when_issued') is-invalid @enderror"
                                   value="{{ old('passport_when_issued') }}"/>
                            @error('passport_when_issued')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row additional-fields">
                        <label for="address" class="col-sm-2 col-form-label">Адреса</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                   name="address" value="{{ old('address') }}" placeholder="Адреса" maxlength="10">
                            @error('address')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('visitors.index', 0) }}" type="submit" class="btn btn-default w-25">Відміна</a>
                    <button type="submit" class="btn btn-info float-right w-25">Додати відвідувача</button>
                </div>
                <!-- /.card-footer -->
            </form>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function toggleAdditionalFields() {
                if ($('#visitor_status').val() === '1') {
                    $('.additional-fields').css('display', 'flex');
                } else {
                    $('.additional-fields').css('display', 'none');
                }
            }

            // Вызываем функцию при загрузке страницы и при изменении статуса
            toggleAdditionalFields();

            $('#visitor_status').change(function () {
                toggleAdditionalFields();
            });
        });
    </script>



@endsection

