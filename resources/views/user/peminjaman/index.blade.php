@extends('layouts.template')
@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Peminjaman</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>
                                {{ auth()->user()->role == 'admin' ? 'Data Peminjaman' : 'Daftar Mobil Sewaan' }}
                            </h4>
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
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $val)
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
                                                    {{ $val->tgl_mulai_peminjaman }}
                                                </td>
                                                <td>
                                                    {{ $val->tgl_selesai_peminjaman }}
                                                </td>
                                                <td>
                                                    <a href="/user/pengembalian/{{ $val->id_peminjaman }}/edit"
                                                        class="btn btn-warning  btn-sm"><i class="fas fa-check"></i></a>
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
