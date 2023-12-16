@extends('layouts.template')
@section('main')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mobil</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>Data Mobil</h4>
                            <div class="card-header-action">
                                <a href="/admin/mobil/create" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah Data Mobil</a>
                            </div>
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
                                            <th>Merek Mobil</th>
                                            <th>Model Mobil</th>
                                            <th>No Plat Mobil</th>
                                            <th>Tarif Mobil</th>
                                            <th>Status Mobil</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mobil as $val)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $val->merek_mobil }}
                                                </td>
                                                <td>
                                                    {{ $val->model_mobil }}
                                                </td>
                                                <td>
                                                    {{ $val->no_plat_mobil }}
                                                </td>
                                                <td>
                                                    {{ $val->tarif_mobil }}
                                                </td>
                                                <td>
                                                    {{ $val->status_mobil }}
                                                </td>
                                                <td>
                                                    <a href="/admin/mobil/{{ $val->id_mobil }}/edit"
                                                        class="btn btn-warning  btn-sm"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <button class="btn btn-danger btn-sm"
                                                        id="btndelete{{ $loop->iteration }}" type="button"
                                                        onclick="deleteData({{ $loop->iteration }},{{ $val->id_mobil }}, '/admin/mobil/','mobil')"><i
                                                            class="fas fa-trash"></i></button>
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
