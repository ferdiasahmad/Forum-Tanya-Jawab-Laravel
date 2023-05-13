<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\pertanyaan;
use App\Models\jawaban;
use Alert;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{

    public function index()
    {
        $data = Pertanyaan::with('kategori')->get();

        return view('pertanyaan.index')->with('pertanyaan', $data);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view ('pertanyaan.create')->with('kategori', $kategori);
    }

    public function store(Request $request)
    {
        $pertanyaan = new pertanyaan();

        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $pertanyaan->id_user = $request->user()->id;
        $pertanyaan->kategori_id = $request->id_kategori;
        $pertanyaan->save();


        Alert::success('berhasil','Data berhasil ditambahkan!');
        return redirect('/pertanyaan');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $jawaban = Jawaban::with('user')->where('id_pertanyaan', $id)->orderBy('id')->get();

        return view('pertanyaan.show')
            ->with('pertanyaan', $pertanyaan)
            ->with('jawaban', $jawaban);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('pertanyaan.edit')->with('pertanyaan',$pertanyaan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi =$request->isi;

        $pertanyaan->save();


        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        $pertanyaan->delete();
        Alert::success('berhasil','Data berhasil dihapus!');
        return redirect('/pertanyaan');
    }

    public function search(Request $request)
    {
        $judul = $request->judul;
        $data = Pertanyaan::with('kategori')
        ->where('judul', 'like', '%' . $judul . '%')
        ->orderBy('id', 'desc')
        ->get();
    }
}
