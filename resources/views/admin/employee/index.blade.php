@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th class="text-left">Прізвище Ім'я</th>
                        <th>Дата народження</th>
                        <th>Роль у компанії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)

                        <tr>
                            <td class="text-left">{{ $user->surname }} {{ $user->name }}</td>
                            <td>{{ $user->birthdate }}</td>
                            <td>
                                @if($user->getRoleNames()->first())
                                 {{ \App\Models\User::$roleMappings[$user->getRoleNames()->first()] }}
                                @endif
                            </td>
                            @if($user->is_working == 1)
                                <td>Працює</td>
                            @else
                                <td>Звільнен</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.employee.edit', $user->id) }}" title="Редагувати">
                                    <i class="fas fa-edit text-info"></i>
                                </a>
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
