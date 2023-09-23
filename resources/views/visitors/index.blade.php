@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Призвище Им'я</th>
                        <th>Дата народження</th>
                        <th>ИНН</th>
                        <th>Телефон</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($visitors)
                        @foreach($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->surname }} {{ $visitor->name }}</td>
                                <td>{{ $visitor->birthdate }}</td>
                                <td>{{ $visitor->tin_code }}</td>
                                <td>{{ $visitor->phone }}</td>
                                <td>
                                    <a class="ml-1" href="{{ route('employee', $user->id) }}" title="Детальніше">
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
