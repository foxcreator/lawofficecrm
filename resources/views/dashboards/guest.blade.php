@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    @if(Auth::user()->role !== \App\Models\User::ROLE_ADMIN)
                        <tr>
                            <th>ID</th>
                            <th>Клиент</th>
                            <th>Роль</th>
                            <th>Адвокат</th>
                            <th>Суть дела</th>
                            <th>Статья</th>
                            <th>Стадия выполнения</th>
                        </tr>
                    @endif
                    </thead>
                    <tbody>
                        Guest
                    </tbody>
                </table>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
