@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="@if($user->thumbnail) {{ $user->thumbnailUrl }}
                                     @elseif($user->gender == 0) {{ asset('assets/dist/img/avatar2.png') }}
                                     @else {{ asset('assets/dist/img/avatar5.png') }}
                                     @endif"
                                     alt="User profile picture"
                                >
                            </div>
                            <h3 class="profile-username text-center">{{ $user->surname }} {{ $user->name }}</h3>
                            <p class="text-muted text-center">
                                @if($user->getRoleNames()->first())
                                    {{ \App\Models\User::$roleMappings[$user->getRoleNames()->first()] }}
                                @endif
                            </p>

                            @role('super-user')
                            @if(!auth()->user()->hasRole('super-user'))
                                @if($user->is_working == 1)
                                    <form action="{{ route('admin.employee.toggle-working', $user->id) }}"
                                          method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-block"><b>Звільнити</b></button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.employee.toggle-working', $user->id) }}"
                                          method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block"><b>Прийняти</b></button>
                                    </form>
                                @endif
                            @endif
                            @endrole
                            <a href="{{ route('admin.employee.edit', $user->id) }}" class="btn btn-outline-info btn-block mt-2" title="Редагувати">
                                Редагувати
                            </a>
                        </div>
                    </div>
                </div>
                @role('super-user')
                    @include('admin.settings.tabs')
                @endrole
            </div>
        </div>
    </section>
@endsection
