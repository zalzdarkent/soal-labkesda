@extends('layouts.app')

@section('title', 'Edit Sampel')

@section('container')
    <div class="card col-md-8 col-lg-8 shadow-lg">
        <div class="card-body">
            <h5 class="d-flex justify-content-center mb-4">Edit Sampel</h5>
            <form action="{{ route('sampel.update', $sampel->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_sampel" class="form-label">Nama Sampel</label>
                    <input type="text" class="form-control" id="nama_sampel" name="nama_sampel"
                        value="{{ $sampel->nama_sampel }}" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                        value="{{ $sampel->tanggal_keluar }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_sampel" class="form-label">Jenis Sampel</label>
                    <input type="text" class="form-control" id="jenis_sampel" name="jenis_sampel"
                        value="{{ $sampel->jenis_sampel }}">
                </div>
                <div class="mb-3">
                    <label for="lokasi_penyimpanan" class="form-label">Lokasi Penyimpanan</label>
                    <input type="text" class="form-control" id="lokasi_penyimpanan" name="lokasi_penyimpanan"
                        value="{{ $sampel->lokasi_penyimpanan }}">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan">{{ $sampel->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
