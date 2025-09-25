@extends('layouts.tutor_layouts')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-900">Profil</h2>

@if(session('success'))
    <div class="mb-4 text-green-600 font-medium">
        {{ session('success') }}
    </div>
@endif

<div class="flex flex-col items-center mb-6">
    <img src="https://via.placeholder.com/150" alt="Tutor Avatar" class="rounded-full mb-4">
    <h3 class="text-xl font-semibold text-gray-900">{{ $user->nama }}</h3>
    <p class="text-gray-600 text-sm">{{ $user->email }}</p>
</div>

<form action="{{ route('tutor.profile.update') }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_lengkap" class="block text-sm font-medium text-gray-900">Nama Lengkap</label>
        <input type="text" name="nama" id="nama_lengkap" value="{{ old('nama', $user->nama) }}"
            class="mt-1 block w-full rounded-md bg-white text-gray-900 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <div>
        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-900">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin"
            class="mt-1 block w-full rounded-md bg-white text-gray-900 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="L" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div>
        <label for="nomor_whatsapp" class="block text-sm font-medium text-gray-900">Nomor Whatsapp</label>
        <input type="text" name="no_whatsapp" id="nomor_whatsapp" value="{{ old('no_whatsapp', $user->no_whatsapp) }}"
            class="mt-1 block w-full rounded-md bg-white text-gray-900 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <div>
        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-900">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir?->format('Y-m-d')) }}"
            class="mt-1 block w-full rounded-md bg-white text-gray-900 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <div class="mt-6 text-center">
        <button type="submit"
            class="px-6 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50">
            Perbarui Profil
        </button>
    </div>
</form>
@endsection
