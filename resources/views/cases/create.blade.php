@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <div class="card">
                    <div class="card-header bg-gradient-navy">
                        <h3 class="card-title">Відкрити нову справу</h3>
                    </div>
                    <form action="{{ route('cases.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="visitor_id" class="col-sm-3 col-form-label">Клієнт</label>
                                        <div class="col-sm-6">
                                            <select name="visitor_id" id="visitor_id" class="form-control select2bs4"
                                                    style="width: 100%;">
                                                @foreach($visitors as $visitor)
                                                    <option value="{{ $visitor->id }}">{{ $visitor->surname }} {{ $visitor->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('visitor_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <a href="{{ route('visitors.create') }}" class="btn btn-outline-dark col-md-1">
                                            <i class="fas fa-user-plus"></i>
                                        </a>
                                    </div>

                                    <div class="form-group row">

                                        <label for="user_id" class="col-sm-3 col-form-label">Адвокат</label>
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
                                        <label for="case_number" class="col-sm-3 col-form-label">Номер справи</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('case_number') is-invalid @enderror" id="case_number"
                                                   name="case_number" value="{{ old('case_number') }}" placeholder="Номер справи">
                                            @error('case_number')
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
                                        <label for="article_id" class="col-sm-3 col-form-label">Стаття</label>
                                        <div class="col-sm-6">
                                            <select name="article_id" id="article_id"
                                                    class="form-control select2bs4" style="width: 100%;">
                                                @foreach($articles as $article)
                                                    <option value="{{ $article->id }}">{{ $article->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('article_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="case_production_number" class="col-sm-3 col-form-label">Номер провадження</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('case_production_number') is-invalid @enderror" id="case_production_number"
                                                   name="case_production_number" value="{{ old('case_production_number') }}" placeholder="Номер провадження">
                                            @error('case_production_number')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="form-group row">
                                        <label for="google_drive_link" class="col-sm-4 col-form-label">Посилання на матеріали справи</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control @error('google_drive_link') is-invalid @enderror" id="google_drive_link"
                                                   name="google_drive_link" value="{{ old('google_drive_link') }}" placeholder="Посилання">
                                            @error('google_drive_link')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="comment" class="col-sm-4 col-form-label">Коментар</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control @error('comment') is-invalid @enderror"
                                                      id="comment"
                                                      name="comment" placeholder="Додайте коментар">{{ old('comment') }}</textarea>
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
                                <div class="col-md-5">

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-sm btn-outline-success btn-block col-md-6 float-right">
                                        Відкрити
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
