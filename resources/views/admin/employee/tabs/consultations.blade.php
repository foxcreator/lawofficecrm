<div class="active tab-pane" id="consultations">
    <div class="card-body table-responsive p-0">
    @if($consultations->count() > 0)

        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Приймальня</th>
                <th>Дата Консультації</th>
                <th>Консультант</th>
                <th>Категорія</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($consultations as $consultation)
                <tr>
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
            </tbody>
        </table>
        <div class="d-flex justify-content-around mt-3">
            {{ $consultations->links() }}
        </div>
    @endif
</div>
</div>
