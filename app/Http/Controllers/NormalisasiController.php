<?php

namespace App\Http\Controllers;

use App\Models\Kreteria;
use App\Models\Alternatif;
use App\Http\Controllers\Controller;



class NormalisasiController extends Controller
{
    public function calculateSaw()
    {
        $alternatives = Alternatif::all();
        $weights = [0.24,0.10,0.24,0.19,0.24]; // Bobot kriteria

        // $minValues = $alternatives->min(); // Mendapatkan nilai minimum dari setiap kolom
        // $maxValues = $alternatives->max(); // Mendapatkan nilai maksimum dari setiap kolom

        $results = [];
        $nomor = 0;

        foreach ($alternatives as $alternative) {
            $harga = $alternative->harga;
            $kualitas = $alternative->kualitas;
            $berat = $alternative->berat;
            $iso = $alternative->iso;
            $resolusi = $alternative->resolusi;
            // $keawetan = $alternative->keawetan;

            // Normalisasi setiap nilai kriteria
            $norm_harga = 120/ $harga;
            $norm_kualitas =  $kualitas/300 ;
            $norm_berat = 1000/ $berat;
            $norm_iso = $iso / 6400;
            $norm_resolusi = $resolusi/ 1600;
            // $norm_keawetan = ($keawetan - $minValues->keawetan) / ($maxValues->keawetan - $minValues->keawetan);


            // Hitung hasil SAW
            $hasil = ($weights[0] * $norm_harga)+ ($weights[1] * $norm_kualitas)  + ($weights[2] * $norm_berat)
                + ($weights[3] * $norm_iso) + ($weights[4] * $norm_resolusi);

            $nomor++;

            $nama_alt = $alternative->nama;
            $results[] = ['nomor' => $nomor, 'nama_alt' => $nama_alt, 'harga' => $norm_harga,'kualitas' => $norm_kualitas,
            'berat' => $norm_berat, 'iso' => $norm_iso,'resolusi' => $norm_resolusi,'hasil'=>$hasil];
        }


        return view('hasil', ['results' => $results]);
    }
}
