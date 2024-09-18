@extends('layouts.app')

@section('title', 'Daftar Sampel')

@section('container')
    <style>
        .text-bg-darah {
            background-color: red;
        }
    </style>
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Daftar Sampel</h4>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body p-4">
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Kode Sampel</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Nama Sampel</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Tanggal Pengambilan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Jenis Sampel</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Status Sampel</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Lokasi Penyimpanan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Opsi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sampel as $item)
                            <tr>
                                <td>
                                    <p class="mb-0 fw-normal fs-4" style="font-weight: 700">{{ $item->kode_sampel }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fw-normal fs-4">{{ $item->nama_sampel }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fw-normal fs-4">{{ $item->tanggal_pengambilan }}</p>
                                </td>
                                <td>
                                    @if ($item->jenis_sampel == 'darah')
                                        <span class="badge text-bg-darah">Darah</span>
                                    @elseif($item->jenis_sampel == 'air')
                                        <span class="badge text-bg-secondary">Air</span>
                                    @else
                                        <span class="badge text-bg-danger">Tanah</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status_sampel == 'Belum Diuji')
                                        <span class="badge bg-warning-subtle text-warning" style="font-weight: 700">Belum
                                            Diuji</span>
                                    @elseif($item->status_sampel == 'Sedang Diuji')
                                        <span class="badge bg-primary-subtle text-primary">Sedang Diuji</span>
                                    @else
                                        <span class="badge bg-success-subtle text-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <p class="mb-0 fw-normal fs-4">{{ $item->lokasi_penyimpanan }}</p>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-6"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('sampel.edit', $item->id) }}">
                                                    <i class="fs-4 ti ti-edit"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                    href="javascript:void(0)" onclick="confirmDelete({{ $item->id }})">
                                                    <i class="fs-4 ti ti-trash"></i>Delete
                                                </a>
                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('sampel.destroy', $item->id) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('sampel.print', $item->id) }}">
                                                    <i class="fs-4 ti ti-printer"></i>Print PDF
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(itemId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + itemId).submit();
                }
            });
        }
    </script>
@endsection
