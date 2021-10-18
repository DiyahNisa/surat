<?php

namespace App\Http\Controllers;

use App\IjinKerja;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \PDF;

class IjinKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ijin = IjinKerja::all();
        return view('Ijin.ijinKerja',compact('ijin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ijin = IjinKerja::all();
        return back(compact('ijin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        IjinKerja::create([
            'idIzins' => $request->idIzins,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'tglIzin' => $request->tglIzin,
            'tglMasuk' => $request->tglMasuk,
            'jenis_surat' => $request->jenis_surat,
            'ketIzin' => $request->ketIzin,
        ]);
        return redirect('ijinKerja')->with(['success' => 'Surat Izin Kerja Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerja  $ijinKerja
     * @return \Illuminate\Http\Response
     */
    public function show(IjinKerja $ijinKerja)
    {

        $pdf = PDF::loadview('Ijin.surat',compact('ijinKerja'));

        $pdf->setPaper('a4','potrait');
        return $pdf->stream();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerja  $ijinKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(IjinKerja $ijinKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IjinKerja  $ijinKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IjinKerja $ijinKerja)
    {
        IjinKerja::where('idIzins', $ijinKerja->idIzins)
        ->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'tglIzin' => $request->tglIzin,
            'jenis_surat' => $request->jenis_surat,
            'ketIzin' => $request->ketIzin,
            ]);
    return redirect('/ijinKerja')->with(['success' => 'Data Surat Izin Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerja  $ijinKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(IjinKerja $ijinKerja)
    {
        IjinKerja::destroy($ijinKerja->idIzins);
        return redirect('/ijinKerja')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
