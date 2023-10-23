            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Мій профіль</a></li>
                            @role('super-user')
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Налаштування</a></li>
                            @endrole
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            @include('admin.settings.profile')
                            @include('admin.settings.settings')
                        </div>
                    </div>
                </div>
            </div>


