<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan =Kegiatan::all();
        return view('Kegiatan.Kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required'
        ]);

        $kegiatan= New Kegiatan;
        $kegiatan->kegiatan=$request->kegiatan;
        $kegiatan->keterangan=$request->keterangan;
        $kegiatan->save();

        if(!$kegiatan){
            return redirect('managekegiatan')->with('error', 'Data Gagal Ditambahkan');
        }
        else{
            return redirect('managekegiatan')->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required'
        ]);

        $kegiatan=Kegiatan::findOrFail($id);
        $kegiatan->kegiatan=$request->get('kegiatan');
        $kegiatan->keterangan=$request->get('keterangan');
        $kegiatan->update();
        
        return redirect()->route('managekegiatan.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan=Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('managekegiatan.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }
}
