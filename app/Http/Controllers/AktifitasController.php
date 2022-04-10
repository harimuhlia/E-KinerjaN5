<?php

namespace App\Http\Controllers;

use App\Models\Aktifitas;
use Illuminate\Http\Request;

class AktifitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aktifitas = Aktifitas::all();
        return view('Data Master.Aktifitas', compact('aktifitas'));
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
            'aktifitas' => 'required'
        ]);

        $aktifitas= New Aktifitas;
        $aktifitas->aktifitas=$request->aktifitas;
        $aktifitas->keterangan=$request->keterangan;
        $aktifitas->save();

        if(!$aktifitas){
            return redirect('aktifitas')->with('error', 'Data Gagal Ditambahkan');
        }
        else{
            return redirect('aktifitas')->with('success', 'Data Berhasil Ditambahkan');
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
            'aktifitas' => 'required'
        ]);

        $aktifitas=Aktifitas::findOrFail($id);
        $aktifitas->aktifitas=$request->get('aktifitas');
        $aktifitas->keterangan=$request->get('keterangan');
        $aktifitas->update();
        
        return redirect()->route('aktifitas.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aktifitas=Aktifitas::findOrFail($id);
        $aktifitas->delete();

        return redirect()->route('aktifitas.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }
}
