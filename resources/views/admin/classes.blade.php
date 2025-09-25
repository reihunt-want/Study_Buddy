@extends('layouts.app_admin')

@section('title', 'Manajemen Kelas')

@section('content')
<div class="bg-orange-300 p-8 rounded-lg min-h-[calc(100vh-10rem)]">
    <div class="grid grid-cols-8 gap-4 font-bold text-center border-b-2 border-dashed pb-2">
        <span>Kelas ID</span>
        <span>Nama Siswa</span>
        <span>Nama Tutor</span>
        <span>Kelas</span>
        <span>Jenjang</span>
        <span>Hari</span>
        <span>Sesi</span>
    </div>

    @foreach($classes as $class)
    <div class="grid grid-cols-8 gap-4 text-center py-2 border-b border-gray-400">
         <span>{{ $class->kelas_id }}</span>
        <span>{{ $class->siswa->user?->nama ?? 'N/A' }}</span>
        <span>{{ $class->tutor->user?->nama ?? 'N/A' }}</span>
        <span>{{ $class->mapel?->nama_mapel ?? 'N/A' }}</span>
        <span>{{ $class->mapel?->jenjang ?? 'N/A' }}</span>
        <span>{{ $class->jadwal?->hari ?? 'N/A' }}</span>
        <span>{{ $class->jadwal?->sesi ?? 'N/A' }}</span>
        <div class="flex justify-center space-x-2">
            <button class="bg-red-500 text-white px-4 py-1 rounded">hapus</button>
            <button class="bg-blue-500 text-white px-4 py-1 rounded">edit</button>
        </div>
    </div>
    @endforeach

    <div class="text-center mt-8">
        <button class="bg-orange-400 text-white px-6 py-2 rounded-lg font-bold">+ TAMBAH DATA</button>
    </div>
</div>
@endsection