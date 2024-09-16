<?php

namespace App\Http\Controllers;

use App\Models\Sampel;
use Barryvdh\DomPDF\PDF as DomPDF;
use Illuminate\Http\Request;

class SampelController extends Controller
{
    protected $pdf;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sampel = Sampel::all();
        return view('sampel.index', compact('sampel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_sampel = Sampel::generateKodeSampel();
        return view('sampel.create', ['kode_sampel' => $kode_sampel]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'kode_sampel' => 'required|string|unique:sampel,kode_sampel',
            'nama_sampel' => 'required|string|max:255',
            'jenis_sampel' => 'nullable|string|in:darah,air,tanah,lainnya',
            'lokasi_penyimpanan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kodeSampel = Sampel::generateKodeSampel();

        $validasi['tanggal_pengambilan'] = now();
        $validasi['kode_sampel'] = $kodeSampel;

        Sampel::create($validasi);

        return redirect()->route('sampel.index')->with('success', 'Sampel berhasil ditambahkan dengan kode ' . $kodeSampel);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sampel = Sampel::findOrFail($id);
        return view('sampel.edit', compact('sampel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama_sampel' => 'required|string|max:255',
            'jenis_sampel' => 'nullable|string|in:darah,air,tanah,lainnya',
            'lokasi_penyimpanan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $sampel = Sampel::findOrFail($id);

        // Update hanya tanggal_keluar dan field yang lain, kecuali tanggal_pengambilan
        $sampel->update($validasi);

        return redirect()->route('sampel.index')->with('success', 'Data sampel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sampel = Sampel::findOrFail($id);

        // Menghapus data sampel
        $sampel->delete();

        return redirect()->route('sampel.index')->with('success', 'Sampel berhasil dihapus.');
    }

    public function __construct(DomPDF $pdf)
    {
        $this->pdf = $pdf;
    }

    public function print($id)
    {
        $sampel = Sampel::findOrFail($id);
        $pdf = $this->pdf->loadView('sampel.print', compact('sampel'));
        return $pdf->download('sampel_'.$sampel->kode_sampel.'.pdf');
    }
}
