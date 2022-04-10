<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi;
use Illuminate\Http\Request;

class TupoksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tupoksi =Tupoksi::all();
        return view('Data Master.Tupoksi', compact('tupoksi'));
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
            'tupoksi' => 'required'
        ]);

        $tupoksi= New Tupoksi;
        $tupoksi->tupoksi=$request->tupoksi;
        $tupoksi->status=$request->status;
        $tupoksi->save();

        if(!$tupoksi){
            return redirect('tupoksi')->with('error', 'Data Gagal Ditambahkan');
        }
        else{
            return redirect('tupoksi')->with('success', 'Data Berhasil Ditambahkan');
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
            'tupoksi' => 'required'
        ]);

        $tupoksi=Tupoksi::findOrFail($id);
        $tupoksi->tupoksi=$request->get('tupoksi');
        $tupoksi->status=$request->get('status');
        $tupoksi->update();
        
        return redirect()->route('tupoksi.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tupoksi=Tupoksi::findOrFail($id);
        $tupoksi->delete();

        return redirect()->route('tupoksi.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }
}
