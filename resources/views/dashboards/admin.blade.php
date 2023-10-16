@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $consultationsThisMonth }}</h3>

                            <p>Консультацій</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('consultations.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-green">
                        <div class="inner">
                            <h3>{{ $wonCasesTotal }}</h3>

                            <p>Виграних справ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('cases.index', 1) }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-gray">
                        <div class="inner">
                            <h3>{{ $newVisitorsThisMonth }}</h3>

                            <p>Новых клиентов</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('visitors.index', 0) }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="card-body table-responsive p-0 mt-4">

                <h3>Поточні справи</h3>
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Номер справи</th>
                        <th>Адвокат</th>
                        <th>Клієнт</th>
                        <th>Суть справи</th>
                        <th>Стаття</th>
                        <th>Етап виконання (статус)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cases as $case)
                        <tr>
                            <td>{{ $case->case_number }}</td>
                            <td>{{ $case->user->surname }} {{ $case->user->name }}</td>
                            <td>{{ $case->visitor->surname }} {{ $case->visitor->name }}</td>
                            <td class="cell-limit">{{ $case->category->name }}</td>
                            <td>{{ $case->article->name }}</td>
                            <td>{{ $case->case_status_name }}</td>
                            <td>
                                @if($case->comment)
                                    <a type="button"
                                       class="ml-1"
                                       data-bs-toggle="popover"
                                       data-bs-placement="left"
                                       data-bs-content="{{ $case?->comment }}"
                                    >
                                        <i class="fas fa-comment-alt text-info"></i>
                                    </a>
                                @endif
                                <a class="ml-1" href="{{ route('cases.show', $case->id) }}" title="Детальніше">
                                    <i class="far fa-list-alt text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                @if($casesCount > $cases->count())
                    <div class="d-flex justify-content-center mb-2 mt-3">
                        <a href="{{ route('cases.index.status', 0) }}" class="btn btn-block btn-outline-dark btn-sm w-25">Переглянути всі</a>
                    </div>
                @endif
            </div>

            <div class="card-body table-responsive p-0">
                <h3>Останні консультації</h3>
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Прізвище Ім'я</th>
                        <th>Дата народження</th>
                        <th>Приймальня</th>
                        <th>Дата Консультації</th>
                        <th>Консультант</th>
                        <th>Категорія</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($consultations)
                        @foreach($consultations as $consultation)
                            <tr>
                                <td>{{ $consultation->visitor->surname }} {{ $consultation->visitor->name }}</td>
                                <td>{{ $consultation->visitor->birthdate }}</td>
                                <td>{{ $consultation->reception->city }}-{{ $consultation->reception->number }}</td>
                                <td>{{ $consultation->consultation_date }}</td>
                                <td>{{ $consultation->user->surname }} {{ $consultation->user->name }}</td>
                                <td>{{ $consultation->category->name }} </td>
                                <td>
                                    @if($consultation->comment)
                                        <a type="button"
                                           data-bs-toggle="popover"
                                           data-bs-placement="left"
                                           data-bs-content="{{ $consultation?->comment }}"
                                        >
                                            <i class="fas fa-comment-alt text-info"></i>
                                        </a>
                                    @endif

                                    <a class="ml-1" href="{{ route('visitor', $consultation->visitor->id) }}"
                                       title="Детальніше">
                                        <i class="far fa-list-alt text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
                @if($consultationsCount > $consultations->count())
                    <div class="d-flex justify-content-center mb-2 mt-3">
                        <a href="{{ route('consultations.index') }}" class="btn btn-block btn-outline-dark btn-sm w-25">Переглянути всі</a>
                    </div>
                @endif
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <script>

    </script>

@endsection

