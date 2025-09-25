@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="bg-orange-300 p-8 rounded-lg shadow-md">
    <div class="text-center mb-6">
        <img src="{{ asset('path/to/profile-illustration.png') }}" alt="Profile Illustration" class="mx-auto w-32 h-32 rounded-full">
    </div>
    <form action="{{ route('students.profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ Auth::user()->nama }}" class="mt-1 block w-full p-2 rounded-md">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full p-2 rounded-md">
        </div>
        <div class="mb-4">
            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="mt-1 block w-full p-2 rounded-md">
                <option value="L" @if(Auth::user()->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                <option value="P" @if(Auth::user()->jenis_kelamin == 'P') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Jenjang Kelas</label>
            <select name="jenjang" class="mt-1 block w-full p-2 rounded-md">
                <option value="SD1" @if(Auth::user()->siswa->jenjang ?? '' == 'SD1') selected @endif>SD1</option>
                <option value="SD2" @if(Auth::user()->siswa->jenjang ?? '' == 'SD2') selected @endif>SD2</option>
                <option value="SD3" @if(Auth::user()->siswa->jenjang ?? '' == 'SD3') selected @endif>SD3</option>
                <option value="SD4" @if(Auth::user()->siswa->jenjang ?? '' == 'SD4') selected @endif>SD4</option>
                <option value="SD5" @if(Auth::user()->siswa->jenjang ?? '' == 'SD5') selected @endif>SD5</option>
                <option value="SD6" @if(Auth::user()->siswa->jenjang ?? '' == 'SD6') selected @endif>SD6</option>
                <option value="SMP1" @if(Auth::user()->siswa->jenjang ?? '' == 'SMP1') selected @endif>SMP1</option>
                <option value="SMP2" @if(Auth::user()->siswa->jenjang ?? '' == 'SMP2') selected @endif>SMP2</option>
                <option value="SMP3" @if(Auth::user()->siswa->jenjang ?? '' == 'SMP3') selected @endif>SMP3</option>
                <option value="SMA1" @if(Auth::user()->siswa->jenjang ?? '' == 'SMA1') selected @endif>SMA1</option>
                <option value="SMA2" @if(Auth::user()->siswa->jenjang ?? '' == 'SMA2') selected @endif>SMA2</option>
                <option value="SMA3" @if(Auth::user()->siswa->jenjang ?? '' == 'SMA3') selected @endif>SMA3</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="nomor_whatsapp" class="block text-sm font-medium text-gray-700">Nomor Whatsapp</label>
            <input type="text" name="no_whatsapp" value="{{ Auth::user()->no_whatsapp }}" class="mt-1 block w-full p-2 rounded-md">
        </div>
        <div class="mb-6">
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ Auth::user()->tanggal_lahir }}" class="mt-1 block w-full p-2 rounded-md">
        </div>
        <div class="text-center">
            <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded-md">Simpan Perubahan</button>
        </div>
        
    </form>
</div>
@endsection

@if(session('success'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
