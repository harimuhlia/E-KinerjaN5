<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeline = Timeline::all()->sortByDesc('created_at')->sortByDesc('Status')->values();
        return view('Data Master.Timeline', compact('timeline'));
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
            'judul' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/gambartimeline', $gambar->hashName());

        $timeline = Timeline::create([
            'gambar'     => $gambar->hashName(),
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi
        ]);

        if ($timeline) {
            //redirect dengan pesan sukses
            return redirect()->route('timeline.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('timeline.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function update(Request $request, Timeline $timeline)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);

        //get data Timeline by ID
        $timeline = Timeline::findOrFail($timeline->id);

        if ($request->file('gambar') == "") {

            $timeline->update([
                'judul'     => $request->judul,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/gambartimeline/' . $timeline->gambar);

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/gambartimeline', $gambar->hashName());

            $timeline->update([
                'gambar'     => $gambar->hashName(),
                'judul'     => $request->judul,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        if ($timeline) {
            //redirect dengan pesan sukses
            return redirect()->route('timeline.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('timeline.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeline = Timeline::findOrFail($id);
        Storage::disk('local')->delete('public/gambartimeline/' . $timeline->gambar);
        $timeline->delete();

        if ($timeline) {
            //redirect dengan pesan sukses
            return redirect()->route('timeline.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('timeline.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
