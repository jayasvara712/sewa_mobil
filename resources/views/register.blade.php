@extends('layouts.template')
@section('main')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form action="/registerProcess" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role" value="user">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="frist_name">Email</label>
                                        <input id="frist_name" type="text" class="form-control" name="email" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="frist_name">Username</label>
                                        <input id="frist_name" type="text" class="form-control" name="username"
                                            autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Password</label>
                                        <input id="frist_name" type="password" class="form-control" name="password"
                                            autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="frist_name">Nama</label>
                                        <input id="frist_name" type="text" class="form-control" name="nama" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="frist_name">Alamat</label>
                                        <input id="frist_name" type="text" class="form-control" name="alamat" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="frist_name">No Telepon</label>
                                        <input id="frist_name" type="text" class="form-control" name="no_telp" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="frist_name">No Sim</label>
                                        <input id="frist_name" type="text" class="form-control" name="no_sim" autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
