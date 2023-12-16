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
                            <form action="/admin/mobil/{{ $mobil->id_mobil }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>No Plat Mobil</label>
                                    <input type="text" class="form-control" name="no_plat_mobil"
                                        value="{{ old('no_plat_mobil', $mobil->no_plat_mobil) }}">
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
