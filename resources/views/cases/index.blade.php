@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <a href="{{ route('cases.create') }}" class="btn btn-block btn-outline-dark btn-sm w-25">Відкрити справу</a>
                @if($cases)

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
                        @foreach($cases as $case)
                            <tr>
                                <td>{{ $case->case_number }}</td>
                                <td>{{ $case->user->surname }} {{ $case->user->name }}</td>
                                <td>{{ $case->visitor->surname }} {{ $case->visitor->name }}</td>
                                <td>{{ $case->category->name }}</td>
                                <td>{{ $case->article->name }}</td>
                                <td>{{ $case->case_status_name }}</td>
                                <td>
                                    @if($case->comment)
                                        <a type="button"
                                           class="ml-1"
                                           data-bs-toggle="popover"
                                           data-bs-placement="left"
                                           data-bs-content="{{ $case?->comment }}"
                                        >
                                            <i class="fas fa-comment-alt text-info"></i>
                                        </a>
                                        <a class="ml-1" href="{{ route('cases.show', $case->id) }}" title="Детальніше">
                                            <i class="far fa-list-alt text-primary"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="d-flex justify-content-around mt-3">
                    {{ $cases->links() }}
                </div>
                @else
                <div class="card-body text-center">
                    <h2>Тут ще ничого немає</h2>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection