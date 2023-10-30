@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $consultationsThisMonth }}</h3>

                            <p>Консультацій</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('consultations.index') }}" class="small-box-footer">Більше інформації <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-green">
                        <div class="inner">
                            <h3>{{ $wonCasesTotal }}</h3>

                            <p>Cправ за весь час</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('cases.index', 1) }}" class="small-box-footer"> Більше інформації <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-gray">
                        <div class="inner">
                            <h3>{{ $newVisitorsThisMonth }}</h3>

                            <p>Нових клієнтів за місяць</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('visitors.index', 0) }}" class="small-box-footer">Більше інформації <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                @if($consultations)
                    <h3>Консультації за сьогодні</h3>
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
                        </tbody>

                    </table>
                @else
                    <h2>Сьгодні немає консультацій</h2>
                @endif
                @if($consultationsCount > $consultations->count())
                    <div class="d-flex justify-content-center mb-2 mt-3">
                        <a href="{{ route('consultations.index') }}" class="btn btn-block btn-outline-dark btn-sm w-25">
                            Переглянути всі
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection

