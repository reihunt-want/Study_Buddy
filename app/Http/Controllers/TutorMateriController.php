<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materi;
use App\Models\Kelas;

class TutorMateriController extends Controller
{
    public function index()
    {
        $tutor = Auth::user(); // user login

        // Ambil semua kelas yang dia ampu beserta mapel dan materi
        $kelas = Kelas::with('mapel.materi')
                    ->where('tutor_id', $tutor->tutor_id)
                    ->get();

        // Flatten materi dari mapel
        $materi = $kelas->flatMap(fn($k) => $k->mapel->materi);

        return view('tutor.materials', compact('materi'));
    }
}
