@extends('layouts.app')

@section('container')
    <div class="card col-md-8 col-lg-8 shadow-lg">
        <div class="card-body">
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h5 class="d-flex justify-content-center mb-4">Tambah Sampel</h5>
            <form action="{{ route('sampel.store') }}" method="post">
                @csrf <!-- Token keamanan CSRF -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kodeSampel" class="form-label">Kode Sampel</label>
                                <input type="text" id="kodeSampel" class="form-control" value="{{ $kode_sampel }}"
                                    name="kode_sampel" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="namaSampel" class="form-label">Nama Sampel</label>
                                <input type="text" class="form-control" id="namaSampel" name="nama_sampel" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenisSampel" class="form-label">Jenis Sampel</label>
                                <select class="form-select" id="jenisSampel" name="jenis_sampel">
                                    <option value="">Pilih Jenis Sampel</option>
                                    <option value="darah">Darah</option>
                                    <option value="air">Air</option>
                                    <option value="tanah">Tanah</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lokasiPenyimpanan" class="form-label">Lokasi Penyimpanan</label>
                                <input type="text" class="form-control" id="lokasiPenyimpanan" name="lokasi_penyimpanan">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
