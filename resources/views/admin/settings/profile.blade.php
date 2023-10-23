 <div class="active tab-pane" id="profile">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="post">
                            <ul class="list-group list-group-unbordered mb-3 mt-0">
                                <li class="list-group-item border-top-0">
                                    <b>E-mail</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Дата народження</b>
                                    @if($birthdate)
                                        <a class="float-right">
                                            {{ $birthdate->format('d-m-Y') }}
                                        </a>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    <b>Телефон</b> <a class="float-right">{{ $user->phone }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="post">
                            <ul class="list-group list-group-unbordered mb-3 mt-0">
                                <li class="list-group-item border-top-0">
                                    <b>Виграних справ</b> <a class="float-right">{{ $winCasesCount }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Усього справ</b> <a class="float-right">{{ $casesCount }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Стаж</b> <a class="float-right">3 роки</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
