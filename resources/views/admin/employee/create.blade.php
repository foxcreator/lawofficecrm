@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <form class="form-horizontal">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Surname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Surame">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date:</label>
                        <div class="input-group date col-sm-10" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                        <label for="customRadio1" class="custom-control-label">Man</label>
                        <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                        <label for="customRadio1" class="custom-control-label">Girl</label>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Sign in</button>
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
            </form>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

