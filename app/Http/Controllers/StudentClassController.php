<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

class StudentClassController extends Controller
{
    public function index()
    {
        $classes = Kelas::all();
        return view('students.classes', compact('classes'));
    }
}
