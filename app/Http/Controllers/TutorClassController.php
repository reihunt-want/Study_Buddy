<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;

class TutorClassController extends Controller
{
    public function index()
    {
        $tutor = Auth::user();

        // Ambil kelas yang diajar tutor ini
        $classes = Kelas::with('mapel', 'jadwalSesi', 'siswa.user')
                        ->where('tutor_id', $tutor->tutor_id)
                        ->get();

        return view('tutor.classes', compact('classes'));
    }
}
