            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Мій профіль</a></li>
                            @role('super-user')
{{--                                <li class="nav-item"><a class="nav-link" href="#notes" data-toggle="tab">Нотатки</a></li>--}}
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Налаштування</a></li>
                            @endrole
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            @include('admin.settings.profile')
{{--                            @include('admin.settings.notes')--}}
                            @include('admin.settings.settings')
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->


