@extends('layouts.app')
@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h2 class="card-title">
                <a href="" class="btn-link text-dark" title="Редагувати"><i class="fas fa-edit"></i></a>
                Справа №{{ $case->case_number }}
            </h2>
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        <ul class="list-group list-group-unbordered mb-3 mt-3">
                            <li class="list-group-item">
                                <b>Клиент</b> <a class="float-right">{{ $case->visitor->surname }} {{ $case->visitor->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Адвокат</b> <a class="float-right">{{ $case->user->surname }} {{ $case->user->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Категорія</b> <a class="float-right">{{ $case->category->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Стаття</b> <a class="float-right">{{ $case->article->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Номер провадження</b> <a class="float-right">№ {{ $case->case_production_number }}</a>
                            </li>
                        </ul>
                        <div class="row d-flex justify-content-between">
                            <a href="javascript:history.back()" class="btn btn-secondary btn-sm">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile row d-flex justify-content-between">
                        <a class="btn btn-xs btn-outline-info col-md-3" href="{{ $case->google_drive_link }}" target="_blank">
                            Матеріали справи
                        </a>
                        <a class="btn btn-xs btn-outline-info col-md-2" href="{{ route('cases.edit', $case->id) }}">Редагувати</a>
                        <button type="button"
                                data-toggle="modal"
                                data-target="#modal-close-case"
                                class="btn btn-xs btn-outline-danger col-md-3"
                                >
                            Закрити справу
                        </button>
                    </div>
                    <div class="card-body box-profile row d-flex justify-content-between">

                        <div class="timeline-item">

                            <h4 class="timeline-header"><a href="#">Коментар</a></h4>

                            <div class="timeline-body">
                               {{ $case->comment }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-close-case">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header h-50 bg-gradient-light">
                    <h6 class="modal-title">Закрити справу</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Будь ласка оберить результат справи&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Відміна</button>
                    <form action="{{ route('cases.update', $case->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="case_status" value="1" class="btn btn-danger btn-sm">Програна</button>
                        <button type="submit" name="case_status" value="2" class="btn btn-success btn-sm">Виграна</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
