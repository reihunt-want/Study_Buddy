<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\JadwalSesi;
use App\Models\KelasPendaftaran;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $jadwal = JadwalSesi::orderBy('hari')->orderBy('sesi')->get();

        return view('students.pendaftaran.create', compact('mapel', 'jadwal'));
    }

    // AJAX: ambil harga sesuai jenjang+mapel+jadwal
    public function getHarga(Request $request)
    {
        $kelas = KelasPendaftaran::where('mapel_id', $request->mapel_id)
                    ->where('jenjang', $request->jenjang)
                    ->where('jadwal_id', $request->jadwal_id)
                    ->first();

        return response()->json([
            'harga' => $kelas ? $kelas->harga : 0
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenjang'   => 'required|string',
            'mapel_id'  => 'required|exists:mapel,mapel_id',
            'durasi'    => 'required|integer',
            'jadwal_id' => 'required|exists:jadwal_sesi,jadwal_id',
        ]);

        $kelas = KelasPendaftaran::where('mapel_id', $request->mapel_id)
                    ->where('jenjang', $request->jenjang)
                    ->where('jadwal_id', $request->jadwal_id)
                    ->first();

        if (!$kelas) {
            return back()->with('error', 'Kelas tidak ditemukan untuk kombinasi yang dipilih.');
        }

        $pendaftaran = Pendaftaran::create([
            'siswa_id'       => Auth::user()->user_id,
            'kelas_id'       => $kelas->kelas_id,
            'status'         => 'pending',
            'tanggal_daftar' => now(),
            'durasi'         => $request->durasi,
            'transaksi_id'   => null,
        ]);

        return redirect()->route('students.dashboard')->with('success', 'Pendaftaran berhasil dibuat.');
    }
}
