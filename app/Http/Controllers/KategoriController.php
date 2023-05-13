<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Alert;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori =Kategori::all();

        return view('kategori.index')->with('kategori', $kategori);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->save();

        Alert::success('berhasil','Data berhasil ditambahkan!');
        return redirect('/kategori');
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
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit')->with('kategori',$kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->nama = $request->nama;
        $kategori->save();
        Alert::success('berhasil','Data berhasil diedit!');
        return redirect('/kategori');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();
        Alert::success('berhasil','Data berhasil dihapus!');

        return redirect('/kategori');
    }
}
