<?php

namespace App\Http\Controllers;

use App\Models\Materi;

class StudentMateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with('mapel')->get();
        return view('students.materi', compact('materi'));
    }
}
