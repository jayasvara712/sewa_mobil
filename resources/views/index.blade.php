@extends('layouts.template')
@section('main')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    @if (session()->has('errors'))
                        <div id="error" style="visibility: hidden">
                            {{ session('errors') }}
                        </div>
                    @elseif(session()->has('success'))
                        <div id="success" style="visibility: hidden">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="/login">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                        required autocomplete="username">
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required autocomplete="current-password">
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                        Login
                                    </button>
                                </div>
                                <div class="mt-5 text-muted text-center">
                                    Don't have an account? <a href="/register">Create One</a>
                                </div>
                            </form>

                        </div>
                    </div>
                @endsection
