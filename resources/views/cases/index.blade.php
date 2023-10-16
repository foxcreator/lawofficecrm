@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card-body table-responsive p-0">
                <a href="{{ route('cases.create') }}" class="btn btn-block btn-outline-dark btn-sm w-25">Відкрити
                    справу</a>
                @if($cases)

                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th><a href="{{ route('cases.index.status', ['caseStatus' => $caseStatus, 'sort_by' => 'case_number', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Номер справи</a></th>
                            <th><a href="{{ route('cases.index.status', ['caseStatus' => $caseStatus, 'sort_by' => 'user_id', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Адвокат</a></th>
                            <th><a href="{{ route('cases.index.status', ['caseStatus' => $caseStatus, 'sort_by' => 'visitor_id', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Клієнт</a></th>
                            <th><a href="{{ route('cases.index.status', ['caseStatus' => $caseStatus, 'sort_by' => 'category_id', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Суть справи</a></th>
                            <th><a href="{{ route('cases.index.status', ['caseStatus' => $caseStatus, 'sort_by' => 'article_id', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Стаття</a></th>
                            <th><a href="{{ route('cases.index.status', ['caseStatus' => $caseStatus, 'sort_by' => 'status', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Етап виконання</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cases as $case)
                            <tr>
                                <td class="cell-limit">{{ $case->case_number }}</td>
                                <td class="cell-limit">{{ $case->user->surname }} {{ $case->user->name }}</td>
                                <td class="cell-limit">{{ $case->visitor->surname }} {{ $case->visitor->name }}</td>
                                <td class="cell-limit">{{ $case->category->name }}</td>
                                <td class="cell-limit">{{ $case->article->name }}</td>
                                <td class="cell-limit">{{ $case->case_status_name }}</td>
                                <td class="cell-limit">
                                    @if($case->comment)
                                        <a type="button"
                                           class="ml-1"
                                           data-bs-toggle="popover"
                                           data-bs-placement="left"
                                           data-bs-content="{{ $case?->comment }}"
                                        >
                                            <i class="fas fa-comment-alt text-info"></i>
                                        </a>
                                    @endif
                                    <a class="ml-1" href="{{ route('cases.show', $case->id) }}" title="Детальніше">
                                        <i class="far fa-list-alt text-primary"></i>
                                    </a>
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
