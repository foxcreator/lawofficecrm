@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>15</h3>

                            <p>Посетителей</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-green">
                        <div class="inner">
                            <h3>53</h3>

                            <p>Выигранных дела</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-gray">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Новых клиентов</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <th>ID</th>
                        <th>Клиент</th>
                        <th>Роль</th>
                        <th>Адвокат</th>
                        <th>Суть дела</th>
                        <th>Статья</th>
                        <th>Стадия выполнения</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>183</td>
                        <td>Василий Пупкин</td>
                        <td>Правонарушитель</td>
                        <td>Василий Самойленко</td>
                        <td>Краткое описание данного дела. Назначен суд на 13-10-2023</td>
                        <td>130ст. КуПАП</td>
                        <td><span class="tag tag-success">Назначен суд</span></td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>Василий Пупкин</td>
                        <td>Истец</td>
                        <td>Василий Самойленко</td>
                        <td>Краткое описание данного дела. Назначен суд на 13-10-2023</td>
                        <td>130ст. КуПАП</td>
                        <td><span class="tag tag-success">Назначен суд</span></td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>Василий Пупкин</td>
                        <td>Ответчик</td>
                        <td>Василий Самойленко</td>
                        <td>Краткое описание данного дела. Назначен суд на 13-10-2023</td>
                        <td>130ст. КуПАП</td>
                        <td><span class="tag tag-success">Назначен суд</span></td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>Василий Пупкин</td>
                        <td>Правонарушитель</td>
                        <td>Василий Самойленко</td>
                        <td>Краткое описание данного дела. Назначен суд на 13-10-2023</td>
                        <td>130ст. КуПАП</td>
                        <td><span class="tag tag-success">Назначен суд</span></td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>Василий Пупкин</td>
                        <td>Истец</td>
                        <td>Василий Самойленко</td>
                        <td>Краткое описание данного дела. Назначен суд на 13-10-2023</td>
                        <td>130ст. КуПАП</td>
                        <td><span class="tag tag-success">Назначен суд</span></td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
