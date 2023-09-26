@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <div class="card">
                    <div class="card-header bg-gradient-lightblue">
                        <h3 class="card-title"> консультацію</h3>
                    </div>
                    <form action="{{ route('consultations.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="visitor_id" class="col-sm-3 col-form-label">Відвідувач</label>
                                        <div class="col-sm-6">
                                            <select name="visitor_id" id="visitor_id" class="form-control select2bs4"
                                                    style="width: 100%;">
                                                @foreach($visitors as $visitor)
                                                    <option
                                                        value="{{ $visitor->id }}">{{ $visitor->surname }} {{ $visitor->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('visitor_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 col-form-label">Консультант</label>

                                        <div class="col-sm-6">
                                            <select name="user_id" id="user_id" class="form-control select2bs4"
                                                    style="width: 100%;">
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{ $user->id }}">{{ $user->surname }} {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Дата консультації:</label>
                                        <div class="input-group date col-sm-5" id="consultation_date">
                                            <input type="date" name="consultation_date"
                                                   class="form-control @error('consultation_date') is-invalid @enderror"
                                                   value="{{ old('consultation_date') }}"/>
                                            @error('consultation_date')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 col-form-label">Категория</label>
                                        <div class="col-sm-6">
                                            <select name="category_id" id="category_id" class="form-control select2bs4"
                                                    style="width: 100%;">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="reception_id" class="col-sm-3 col-form-label">Приймальня</label>
                                        <div class="col-sm-6">
                                            <select name="reception_id" id="reception_id"
                                                    class="form-control select2bs4" style="width: 100%;">
                                                @foreach($receptions as $reception)
                                                    <option value="{{ $reception->id }}">{{ $reception->city }}
                                                        -{{ $reception->number }}</option>
                                                @endforeach
                                            </select>
                                            @error('reception_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="comment" class="col-sm-3 col-form-label">Коментар</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control @error('comment') is-invalid @enderror"
                                                      id="comment"
                                                      name="comment" placeholder="Email"></textarea>
                                            @error('comment')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer row d-flex justify-content-between">
                                <div class="col-md-6"> <!-- Половина ширины (50%) -->
                                    <button type="submit" class="btn btn-sm btn-outline-success btn-block col-md-6">
                                        Створити
                                    </button>
                                </div>
                                <div class="col-md-6"> <!-- Половина ширины (50%) -->
                                    <a href="{{ route('visitors.create') }}"
                                       class="btn btn-outline-dark btn-sm btn-block col-md-6 float-right">Додати нового
                                        відвідувача</a>
                                </div>
                            </div>
                    </form>
                </div>

                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Призвище Им'я</th>
                        <th>Дата народження</th>
                        <th>Приймальня</th>
                        <th>Дата Консультації</th>
                        <th>Консультант</th>
                        <th>Категорія</th>
                        <th>Коментар</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($consultations)
                        @foreach($consultations as $consultation)
                            <tr>
                                <td>{{ $consultation->visitor->surname }} {{ $consultation->visitor->name }}</td>
                                <td>{{ $consultation->visitor->birthdate }}</td>
                                <td>{{ $consultation->reception->name }}-{{ $consultation->reception->number }}</td>
                                <td>{{ $consultation->consultation_date }}</td>
                                <td>{{ $consultation->user->surname }} {{ $consultation->user->name }}</td>
                                <td>{{ $consultation->category->name }} </td>
                                <td>{{ $consultation?->comment }} </td>
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
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
