<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        //
        $alternatif = Alternatif::all();
        // dd($alternatif);
        return view('alternatif', compact('alternatif'));
    }
    public function create(){
        return view('alternatif.addalternatif');
    }
    public function store(Request $request){
        // dd($request->all());
        // dd($request->except(['_token','submit']));
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'kualitas' => 'required',
            'berat' => 'required',
            'iso' => 'required',
            'resolusi' => 'required',
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $file = $request->file('image');

     $filename= uniqid().'.'. $file->getClientOriginalExtension();
       $file->storeAs('public/image',$filename);
       $data['image']= $filename;

        Alternatif::create($data);

        return  redirect('/alternatif');
        // dd($request->all());
        // $alternatif = new Alternatif;
        // $alternatif->nama = $request->nama;
        // $alternatif->deskripsi = $request->deskripsi;
        // $alternatif->harga = $request->harga;
        // $alternatif->kualitas = $request->kualitas;
        // $alternatif->berat = $request->berat;
        // $alternatif->iso = $request->iso;
        // $alternatif->berat = $request->berat;
        // $alternatif->save();
        return redirect('/alternatif');
    }
    public function delete($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        return redirect('/alternatif')->with('success', 'berhasil dihapus');
    }
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        // $alternatif->update();
        // dd($alternatif);
        return view('alternatif.putalternatif', compact(['alternatif']));
    }
    public function update($id, Request $request)
    {
       // dd($request->all());
        // dd($request->except(['_token','submit']));
        $request->validate([
            "nama_alternatif" => 'required|min:3|max:50',
            "deskripsi" => 'required',
            "harga" => 'required',
            "kualitas" => 'required',
            "berat" => 'required',
            "iso" => 'required',
            "resolusi" => 'required'
        ]);
        $alternatif = Alternatif::find($id);
        $alternatif->nama_alternatif = $request->nama_alternatif;
        $alternatif->deskripsi = $request->deskripsi;
        $alternatif->harga = $request->harga;
        $alternatif->save();

        return redirect('/Alternatif');
    }

}
