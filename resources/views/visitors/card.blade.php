@extends('layouts.app')
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h2 class="card-title">
                <a href="" class="btn-link text-dark" title="Редагувати"><i class="fas fa-edit"></i></a>
                {{ $visitor->surname }} {{ $visitor->name }} {{ $visitor->father_name }} - {{ $visitor->visitor_status_name }}
            </h2>
        </div>
        <div class="card-body">
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="row d-flex justify-content-between">
                            <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-info btn-xs col-sm-3">Зробити клієнтом</a>
                            @if($visitor->visitor_status)
                            <button type="button" class="btn btn-dark btn-xs col-sm-3">Створити договір</button>
                            @endif
                        </div>
                        <ul class="list-group list-group-unbordered mb-3 mt-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $visitor->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Телефон</b> <a class="float-right">{{ $visitor->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Дата народження</b> <a class="float-right">{{ \Carbon\Carbon::create($visitor->birthdate)->format('d m Y') }}</a>
                            </li>
                            @if($visitor->visitor_status)
                            <li class="list-group-item">
                                <b>РНОКПП</b> <a class="float-right">{{ $visitor->tin_code }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Паспорт</b> <a class="float-right">№ {{ $visitor->passport_number }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Виданий</b> <a class="float-right">{{ $visitor->passport_issued_by }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Дата видачи</b> <a class="float-right">{{ \Carbon\Carbon::create($visitor->passport_when_issued)->format('d m Y') }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Адреса</b> <a class="float-right">{{ $visitor->address }}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
        <!-- /.card -->
    </div>
@endsection
