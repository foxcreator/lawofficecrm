@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <a href="{{ route('visitors.create') }}" class="btn btn-block btn-outline-dark btn-sm w-25">Додати відвідувача</a>
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Номер справи</th>
                        <th>Адвокат</th>
                        <th>Клієнт</th>
                        <th>Суть справи</th>
                        <th>Стаття</th>
                        <th>Етап виконання</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($cases)
                        @foreach($cases as $case)
                            <tr>
                                <td>{{ $case->case_number }}</td>
                                <td>{{ $case->visitor->surname }} {{ $case->visitor->name }}</td>
                                <td>{{ $case->user->surname }} {{ $case->user->name }}</td>
                                <td>{{ $visitor->case_category }}</td>
                                <td>{{ $visitor->article }}</td>
                                <td>{{ $visitor->case_status }}</td>
                                <td>
                                    <a class="ml-1" href="{{ route('visitor', $visitor->id) }}" title="Детальніше">
                                        <i class="far fa-list-alt text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
