<?php

namespace App\Http\Controllers;

use App\Models\Kreteria;
// use App\Models\Kreterias;
use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Request;
    use Illuminate\Http\Request;


class KreteriaController extends Controller
{
    public function index()
    {
        //
        $kreteria = Kreteria::all();
        // dd($kreteria);
        return view('kreteria', compact('kreteria'));
    }
    public function create(){
        return view('addkreteria');
    }
    public function store(Request $request){
        // dd($request->all());
        // dd($request->except(['_token','submit']));
         $request->validate([
            "nama" => 'required|min:3|max:50',
            "bobot" => 'required',
            "label" => 'required'
        ]);
        $kreteria = new Kreteria;
        $kreteria->nama = $request->nama;
        $kreteria->bobot = $request->bobot;
        $kreteria->label = $request->label;
        $kreteria->save();

        return redirect('/kreteria');
    }
    public function delete($id)
    {
        $kreteria = Kreteria::find($id);
        $kreteria->delete();
        return redirect('/kreteria')->with('success', 'berhasil dihapus');
    }
    public function edit($id)
    {
        $kreteria = Kreteria::find($id);
        // $kreteria->update();
        // dd($kreteria);
        return view('putkreteria', compact(['kreteria']));
    }
    public function update($id, Request $request)
    {
       // dd($request->all());
        // dd($request->except(['_token','submit']));
        $request->validate([
            "nama" => 'required|min:3|max:50',
            "bobot" => 'required',
            "label" => 'required'
        ]);
        $kreteria = Kreteria::find($id);
        $kreteria->nama = $request->nama;
        $kreteria->bobot = $request->bobot;
        $kreteria->label = $request->label;
        $kreteria->save();

        return redirect('/kreteria');
    }

}
