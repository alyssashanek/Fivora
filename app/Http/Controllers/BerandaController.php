<?php

namespace App\Http\Controllers;

use App\Models\Facility;

class BerandaController extends Controller
{
    public function index()
    {
        // Nanti ganti dengan query ke tabel facilities sesuai rancangan DB kamu, contoh:
        //
        // $popularFacilities = Facility::where('is_popular', true)
        //     ->take(4)
        //     ->get()
        //     ->map(fn ($f) => [
        //         'nama'   => $f->nama,
        //         'lokasi' => $f->lokasi,
        //         'status' => $f->status_ketersediaan, // 'Tersedia' / 'Tidak Tersedia'
        //         'gambar' => $f->gambar_url,
        //     ]);

        $categories = [
            ['label' => 'Ruang Kelas',  'icon' => '🏫', 'slug' => 'ruang-kelas'],
            ['label' => 'Laboratorium', 'icon' => '🧪', 'slug' => 'laboratorium'],
            ['label' => 'Aula',         'icon' => '🏛️', 'slug' => 'aula'],
            ['label' => 'Alat',         'icon' => '🛠️', 'slug' => 'alat'],
            ['label' => 'Lapangan',     'icon' => '⚽', 'slug' => 'lapangan'],
        ];

        return view('beranda', compact('categories'));
        // Tambahkan compact('popularFacilities') setelah query beneran dibuat.
    }
}