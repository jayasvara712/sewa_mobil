@extends('layouts.template')
@section('main')
    @if (session()->has('success'))
        <div id="success" style="visibility: hidden">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-fire"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>User</h4>
                            </div>
                            <div class="card-body">
                                {{ $user }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Mobil</h4>
                            </div>
                            <div class="card-body">
                                {{ $mobil }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Peminjaman</h4>
                            </div>
                            <div class="card-body">
                                {{ $peminjaman }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-ship"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengembalian</h4>
                            </div>
                            <div class="card-body">
                                {{ $pengembalian }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
