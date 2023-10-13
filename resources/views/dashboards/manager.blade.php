@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row d-flex justify-content-around">
                <div class="col-lg-5 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $consultationsThisMonth }}</h3>

                            <p>Консультацій</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('consultation.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-5 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-gray">
                        <div class="inner">
                            <h3>{{ $newVisitorsThisMonth }}</h3>

                            <p>Новых клиентов</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('visitors.index', 0) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
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
                                </td>
                                <td>
                                    <a class="ml-1" href="{{ route('visitor', $consultation->visitor->id) }}" title="Детальніше">
                                        <i class="far fa-list-alt text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

