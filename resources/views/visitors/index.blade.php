@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card-body table-responsive p-0">
                <a href="{{ route('visitors.create') }}" class="btn btn-block btn-outline-dark btn-sm w-25">Додати відвідувача</a>
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th class="text-left">Прізвище Ім'я</th>
                        <th>E-mail</th>
                        <th>Дата народження</th>
                        @can('visitors-create')
                        <th>Телефон</th>
                        @endcan
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($visitors)
                        @foreach($visitors as $visitor)
                            <tr>
                                <td class="text-left">{{ $visitor->surname }} {{ $visitor->name }}</td>
                                <td>{{ $visitor->email }}</td>
                                <td>{{ $visitor->birthdate }}</td>
                                @can('visitors-create')
                                <td>{{ $visitor->phone }}</td>
                                @endcan
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
