@extends('layouts.app')

@section('title', 'Kelas')

@section('content')
<div class="grid grid-cols-5 text-center mb-4 text-white font-semibold">
    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
    <div class="p-2 border-b-2 @if($day == 'Senin') border-green-700 @else border-transparent @endif">{{ $day }}</div>
    @endforeach
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($classes as $class)
    <div class="bg-orange-300 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">{{ $class->mapel->nama_mapel }}</h3>
@if($class->tutor && $class->tutor->user && $class->tutor->user->isTutor())
    {{ $class->tutor->user->nama }}
@endif

        <p>
    Nama Tutor: 
    {{ $class->tutor && $class->tutor->user ? $class->tutor->user->nama : 'Belum ada tutor' }}
</p>

@php
        $sesiMap = [
            1 => '16:00 - 18:00',
            2 => '19:00 - 21:00',
            // tambah sesi lain kalau ada
        ];
@endphp

        <p class="text-sm text-gray-600">
            {{ $class->jadwalSesi ? ($sesiMap[$class->jadwalSesi->sesi] ?? 'Belum ada jadwal') : 'Belum ada jadwal' }}
        </p>
        <a href="#" class="mt-4 inline-block bg-green-700 text-white py-2 px-4 rounded-md">Hadiri Kelas</a>
    </div>
    @endforeach
</div>
@endsection