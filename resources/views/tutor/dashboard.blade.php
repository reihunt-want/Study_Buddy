@extends('layouts.tutor_layouts')

@section('content')
    <h2 class="text-3xl mb-4">
        Halo, {{ Auth::user()->nama }}! Mau ngapain hari ini?
    </h2>

    <!-- Bisa ditambahkan grid ringkasan atau tombol cepat -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <a href="{{ route('tutor.classes') }}" class="bg-orange-300 p-6 rounded-lg shadow-md text-gray-900 text-center hover:bg-orange-400">
            Lihat Kelas
        </a>
        <a href="{{ route('tutor.materials') }}" class="bg-orange-300 p-6 rounded-lg shadow-md text-gray-900 text-center hover:bg-orange-400">
            Materi
        </a>
        <a href="{{ route('tutor.profile') }}" class="bg-orange-300 p-6 rounded-lg shadow-md text-gray-900 text-center hover:bg-orange-400">
            Profil Saya
        </a>
    </div>
@endsection
