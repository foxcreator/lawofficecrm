<div class="tab-pane" id="visitors">
    @if($visitors->count() > 0)
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Прізвище Ім'я</th>
                <th>Дата народження</th>
                <th>ИНН</th>
                <th>Телефон</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($visitors)
                @foreach($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->surname }} {{ $visitor->name }}</td>
                        <td>{{ $visitor->birthdate }}</td>
                        <td>{{ $visitor->tin_code }}</td>
                        <td>{{ $visitor->phone }}</td>
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
        <div class="d-flex justify-content-around mt-3">
            {{ $consultations->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <h2>Відвідувачи не знайдені</h2>
        </div>
    @endif

</div>
