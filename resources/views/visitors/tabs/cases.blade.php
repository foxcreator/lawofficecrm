<div class="tab-pane" id="cases">
    @if($cases)

        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Номер справи</th>
                <th>Адвокат</th>
                <th>Суть справи</th>
                <th>Стаття</th>
                <th>Етап виконання (статус)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cases as $case)
                <tr>
                    <td class="cell-limit">{{ $case->case_number }}</td>
                    <td class="cell-limit">{{ $case->user->surname }} {{ $case->user->name }}</td>
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
    @endif
</div>
