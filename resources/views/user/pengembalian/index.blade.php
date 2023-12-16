@extends('layouts.template')
@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengembalian</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>
                                {{ auth()->user()->role == 'admin' ? 'Data Peminjaman' : 'Daftar Pengembalian Mobil' }}
                            </h4>
                            @if (auth()->user()->role != 'admin')
                                <div class="card-header-action">
                                    <a href="/user/pengembalian/create" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Pengembalian Mobil</a>
                                </div>
                            @endif
                        </div>

                        @if (session()->has('success'))
                            <div id="success" style="visibility: hidden">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2c">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Peminjam</th>
                                            <th>Merek Mobil</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengembalian as $val)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $val->user->nama }}
                                                </td>
                                                <td>
                                                    {{ $val->mobil->merek_mobil }}
                                                </td>
                                                <td>
                                                    {{ $val->tgl_pengembalian }}
                                                </td>
                                                <td>
                                                    {{ $val->total_bayar }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
