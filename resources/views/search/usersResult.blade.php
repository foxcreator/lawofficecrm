<div class="tab-pane" id="users">
    @if($users->count() > 0)
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Прізвище Ім'я</th>
                <th>Дата народження</th>
                <th>Роль у компанії</th>
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>
                    <td>{{ $user->surname }} {{ $user->name }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>
                        @if($user->getRoleNames()->isNotEmpty())
                            {{ \App\Models\User::$roleMappings[$user->getRoleNames()->first()] }}
                        @endif
                    </td>
                    @if($user->is_working == 1)
                        <td>Працює</td>
                    @else
                        <td>Звільнен</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.employee.edit', $user->id) }}" title="Редагувати">
                            <i class="fas fa-edit text-info"></i>
                        </a>
                        <a class="ml-1" href="{{ route('employee', $user->id) }}" title="Детальніше">
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
    @else
        <div class="card-body text-center">
            <h2>Співробітників не знайдені</h2>
        </div>
    @endif
</div>

