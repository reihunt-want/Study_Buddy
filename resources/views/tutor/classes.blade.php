@extends('layouts.tutor_layouts')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Kelas</h2>
    <div class="flex justify-around text-center mb-6 border-b border-gray-400">
        <button class="px-4 py-2 text-gray-800 border-b-2 border-transparent hover:border-gray-800">SENIN</button>
        <button class="px-4 py-2 text-gray-800 border-b-2 border-gray-800">SELASA</button>
        <button class="px-4 py-2 text-gray-800 border-b-2 border-transparent hover:border-gray-800">RABU</button>
        <button class="px-4 py-2 text-gray-800 border-b-2 border-transparent hover:border-gray-800">KAMIS</button>
        <button class="px-4 py-2 text-gray-800 border-b-2 border-transparent hover:border-gray-800">JUMAT</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-orange-200 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2 text-gray-800">Nama Mata Pelajaran</h3>
            <p class="text-sm text-gray-800 mb-1">Nama Siswa</p>
            <p class="text-sm flex items-center mb-1 text-gray-800">
                <span class="mr-2">⏰</span> 16.00 - 18.00
            </p>
            <p class="text-sm flex items-center mb-4 text-gray-800">
                <span class="mr-2">🎓</span> Jenjang
            </p>
            <button class="w-full py-2 bg-green-700 text-white rounded-md hover:bg-green-800">Hadiri Kelas</button>
        </div>

        <div class="bg-orange-200 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2 text-gray-800">Nama Mata Pelajaran</h3>
            <p class="text-sm text-gray-800 mb-1">Nama Siswa</p>
            <p class="text-sm flex items-center mb-1 text-gray-800">
                <span class="mr-2">⏰</span> 19.00 - 21.00
            </p>
            <p class="text-sm flex items-center mb-4 text-gray-800">
                <span class="mr-2">🎓</span> Jenjang
            </p>
            <button class="w-full py-2 bg-green-700 text-white rounded-md hover:bg-green-800">Hadiri Kelas</button>
        </div>
    </div>
@endsection
