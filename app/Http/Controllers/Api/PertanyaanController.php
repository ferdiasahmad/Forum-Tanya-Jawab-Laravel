<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PertanyaanResource;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();

        return new PertanyaanResource($pertanyaan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pertanyaan = new Pertanyaan();

        $pertanyaan->id_user = 1;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;

        $pertanyaan->save();

        return new PertanyaanResource($pertanyaan);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        return new PertanyaanResource($pertanyaan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        $pertanyaan->id_user = 1;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;


        return new PertanyaanResource($pertanyaan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        $pertanyaan->delete();

        return new PertanyaanResource($pertanyaan);
    }
}
