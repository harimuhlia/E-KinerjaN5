<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = Tahun::all();
        return view('Data Master.Tahun', compact('tahun'));
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
            'tahun' => 'required|unique:tahuns|max:4'
        ]);

        $tahun= New Tahun;
        $tahun->tahun=$request->tahun;
        $tahun->save();

        if(!$tahun){
            return redirect('tahun')->with('error', 'Data Gagal Ditambahkan');
        }
        else{
            return redirect('tahun')->with('success', 'Data Berhasil Ditambahkan');
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
            'tahun' => 'required|unique:tahuns|max:4'
        ]);

        $tahun=Tahun::findOrFail($id);
        $tahun->tahun=$request->get('tahun');
        $tahun->update();
        
        return redirect()->route('tahun.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun=Tahun::findOrFail($id);
        $tahun->delete();

        return redirect()->route('tahun.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }
}
