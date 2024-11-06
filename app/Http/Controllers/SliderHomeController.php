<?php

namespace App\Http\Controllers;

use App\Models\SliderHome;
use Illuminate\Http\Request;

class SliderHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = SliderHome::all();
        return view('slider_home.dashboard',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider_home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'url' => 'required|string'
        ]);

        try {
            $adds = new SliderHome();
            $adds->judul = $request->judul;
            $adds->keterangan = $request->keterangan;
            $adds->url = $request->url;
            $adds->save();

            return redirect('/sliderhome')->with('success','Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('/sliderhome/tambah')->with('fail',$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SliderHome $sliderHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $upd = SliderHome::find($id);
        return view('slider_home.update',compact('upd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SliderHome $sliderHome)
    {
        $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string|max:1000',
            'url' => 'required|string'
        ]);

        try {
            SliderHome::where('id',$request->id)->update([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'url' => $request->url
            ]);

            return redirect('/sliderhome')->with('success','Berhasil Update Data');
        } catch (\Exception $e) {
            return redirect('/sliderhome')->with('fail',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            SliderHome::find($id)->delete();
            return redirect('/sliderhome')->with('success','Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect('/sliderhome')->with('fail',$e->getMessage());
        }
    }
}
