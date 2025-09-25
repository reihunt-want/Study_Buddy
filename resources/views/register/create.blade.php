@extends('layouts.home_layout')

@section('content')
  <h2>Lengkapi Data Anda</h2>

  <form action="{{ route('daftar.store') }}" method="POST">
    @csrf
    <div>
      <label>Nama Lengkap</label>
      <input type="text" name="nama" required>
    </div>
    <div>
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" required>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
    <div>
      <label>Email</label>
      <input type="email" name="email" required>
    </div>
    <div>
      <label>Nomor WhatsApp Aktif</label>
      <input type="text" name="no_whatsapp" required>
    </div>
    <div>
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir">
    </div>
    <div>
      <label>Password</label>
      <input type="password" name="password" required>
    </div>
    <button type="submit">Daftar Sekarang!</button>
  </form>
@endsection
