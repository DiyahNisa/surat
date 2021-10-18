<?php

namespace App\Http\Controllers;

use App\LamarKerja;
use Illuminate\Http\Request;
use PDF;

class LamarKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lamar = LamarKerja::all();
        return view('Lamar.lamarKerja',compact('lamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lamar = LamarKerja::all();
        return back(compact('lamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LamarKerja::create([
            'idLamar' => $request->idLamar,
            'tujuan' => $request->tujuan,
            'nama' => $request->nama,
            'tempatLahir' => $request->tempatLahir,
            'tglLahir' => $request->tglLahir,
            'jk' => $request->jk,
            'penTerakhir' => $request->penTerakhir,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'posisi' => $request->posisi,
            'tempatPembuatan' => $request->tempatPembuatan,
        ]);
        return redirect('lamarKerja')->with(['success' => 'Surat Lamar Pekerjaaan Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LamarKerja  $lamarKerja
     * @return \Illuminate\Http\Response
     */
    public function show(LamarKerja $lamarKerja)
    {
        // return view('Lamar.surat',compact('lamarKerja'));
        $pdf = PDF::loadview('Lamar.surat',compact('lamarKerja'));

        $pdf->setPaper('a4','potrait');
        return $pdf->stream();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LamarKerja  $lamarKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(LamarKerja $lamarKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LamarKerja  $lamarKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LamarKerja $lamarKerja)
    {
        LamarKerja::where('idLamar', $lamarKerja->idLamar)
        ->update([
            'tujuan' => $request->tujuan,
            'nama' => $request->nama,
            'tempatLahir' => $request->tempatLahir,
            'tglLahir' => $request->tglLahir,
            'jk' => $request->jk,
            'penTerakhir' => $request->penTerakhir,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'posisi' => $request->posisi,
            'tempatPembuatan' => $request->tempatPembuatan,
            ]);
            return redirect('/lamarKerja')->with(['success' => 'Data Surat Izin Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LamarKerja  $lamarKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(LamarKerja $lamarKerja)
    {
        LamarKerja::destroy($lamarKerja->idLamar);
        return redirect('/lamarKerja')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
