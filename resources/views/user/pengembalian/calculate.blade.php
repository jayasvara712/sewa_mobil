@extends('layouts.template')
@section('main')

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
                <h1>Pengembalian Mobil</h1>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/user/pengembalian/" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ $id_user }}">
                                <input type="hidden" name="id_mobil" value="{{ $mobil->id_mobil }}">
                                <div class="form-group">
                                    <label>No Plat Mobil</label>
                                    <input type="text" class="form-control" name="no_plat_mobil"
                                        value="{{ old('no_plat_mobil', $mobil->no_plat_mobil) }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label>
                                    <input type="text" class="form-control" name="tgl_pengembalian"
                                        value="{{ old('tgl_pengembalian', $tgl_pengembalian) }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Lama Sewa</label>
                                    <input type="text" class="form-control" name="lama_sewa"
                                        value="{{ old('lama_sewa', $lama_sewa) }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Total Bayar</label>
                                    <input type="text" class="form-control" name="total_bayar"
                                        value="{{ old('total_bayar', $total_bayar) }}" readonly>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Jaya Svara</a>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>

@endsection
