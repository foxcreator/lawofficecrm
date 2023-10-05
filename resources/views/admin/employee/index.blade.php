@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Прізвище Ім'я</th>
                        <th>Дата народження</th>
                        <th>Роль у фирмі</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->surname }} {{ $user->name }}</td>
                            <td>{{ $user->birthdate }}</td>
                            <td>{{ $user->role_name }}</td>
                            @if($user->is_working == 1)
                                <td>Працює</td>
                            @else
                                <td>Звільнен</td>
                            @endif
                            <td>
                                @if($user->is_working == 1)
                                <a href="{{ route('admin.employee.edit', $user->id) }}" title="Редагувати">
                                    <i class="fas fa-edit text-info"></i>
                                </a>
                                @endif
                                <a class="ml-1" href="{{ route('employee', $user->id) }}" title="Детальніше">
                                    <i class="far fa-list-alt text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
