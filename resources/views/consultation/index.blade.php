@extends('layouts.app')
@section('title', 'Консультації |')
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
                        <th>Приймальня</th>
                        <th>Дата Консультації</th>
                        <th>Консультант</th>
                        <th>Категорія</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($consultations)
                        @foreach($consultations as $consultation)
                            <tr>
                                <td class="text-left">{{ $consultation->visitor->surname }} {{ $consultation->visitor->name }}</td>
                                <td>{{ \Carbon\Carbon::create($consultation->visitor->birthdate)->format('d.m.Y') }}</td>
                                <td>{{ $consultation->reception->city }}-{{ $consultation->reception->number }}</td>
                                <td>{{ \Carbon\Carbon::create($consultation->consultation_date)->format('d.m.Y') }}</td>
                                <td>{{ $consultation->user->surname }} {{ $consultation->user->name }}</td>
                                <td>{{ $consultation->category->name }} </td>
                                <td>
                                    @if($consultation->comment)
                                    <a type="button"
                                            data-bs-toggle="popover"
                                            data-bs-placement="left"
                                            data-bs-content="{{ $consultation?->comment }}"
                                    >
                                        <i class="fas fa-comment-alt text-info"></i>
                                    </a>
                                    @endif
                                    <a class="ml-1" href="{{ route('visitor', $consultation->visitor->id) }}" title="Детальніше">
                                        <i class="far fa-list-alt text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-around mt-3">
                {{ $consultations->links() }}
            </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
