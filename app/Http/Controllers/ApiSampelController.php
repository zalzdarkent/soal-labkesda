<?php

namespace App\Http\Controllers;

use App\Models\Sampel;
use Illuminate\Http\Request;

class ApiSampelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sampel = Sampel::all();
        return response()->json([
            'status' => 200,
            'message' => 'Data Sampel Berhasil Diambil',
            'data' => $sampel,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sampel = Sampel::find($id);
        return response()->json([
            'status'=> 200,
            'message'=> 'Data ditemukan',
            'data'=> $sampel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
