@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <span class="badge pl-3 @if($cases->count() > 0) text-success @else text-danger @endif ">
                                        {{ $cases->count() }}
                                    </span>
                                    <a class="position-relative nav-link active" href="#cases" data-toggle="tab">
                                        Справи
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <span class="badge pl-3 @if($consultations->count() > 0) text-success @else text-danger @endif ">
                                        {{ $consultations->count() }}
                                    </span>
                                    <a class="nav-link" href="#consultation" data-toggle="tab">Консультації</a>
                                </li>
                                <li class="nav-item">
                                    <span class="badge pl-3 @if($visitors->count() > 0) text-success @else text-danger @endif ">
                                        {{ $visitors->count() }}
                                    </span>
                                    <a class="nav-link" href="#visitors" data-toggle="tab">Відвідувачи</a>
                                </li>
                                @can('employee-all')
                                    <li class="nav-item">
                                        <span
                                            class="badge pl-3 @if($users->count() > 0) text-success @else text-danger @endif ">
                                            {{ $users->count() }}
                                        </span>
                                        <a class="nav-link" href="#users" data-toggle="tab">Співробітники</a>
                                    </li>
                                @endcan
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @include('search.casesResult')

                                @include('search.consultationsResult')
                                @include('search.visitorsResult')
                                @include('search.usersResult')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
