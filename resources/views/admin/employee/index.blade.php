@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Имя Фамилия</th>
                            <th>Дата рождения</th>
                            <th>Роль</th>
                            <th>Состояние</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->surname }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>{{ $user->role_name }}</td>
                        @if($user->is_working == 1)
                        <td>Работает</td>
                        @else
                            <td>Уволен</td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
