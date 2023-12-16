@extends('layouts.template')
@section('main')
    @if (session()->has('success'))
        <div id="success" style="visibility: hidden">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div id="error" style="visibility: hidden">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home Persewaan Mobil</h1>
            </div>
            <div class="row">

                @foreach ($mobil as $val)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ $val->no_plat_mobil }}</h4>
                                <div class="card-header-action">
                                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                                        @if ($val->status_mobil == 'Tersedia')
                                            <li class="nav-item">
                                                <a class="nav-link" id="sewa-tab{{ $val->id_mobil }}" data-toggle="tab"
                                                    href="#sewa{{ $val->id_mobil }}" role="tab" aria-controls="home"
                                                    aria-selected="false">
                                                    Sewa</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Merek : {{ $val->merek_mobil }}</p>
                                <p>Model : {{ $val->model_mobil }}</p>
                                <p>Harga : {{ $val->tarif_mobil }}</p>
                                <p>Status : {{ $val->status_mobil }}</p>
                            </div>

                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade" id="sewa{{ $val->id_mobil }}" role="tabpanel"
                                    aria-labelledby="sewa-tab{{ $val->id_mobil }}">
                                    <form action="/user/peminjaman" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}">
                                        <input type="hidden" name="id_mobil" value="{{ $val->id_mobil }}">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="tgl_mulai_peminjaman">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="tgl_selesai_peminjaman">
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i>
                                            Sewa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </section>
    </div>
@endsection
