@extends('layouts.home_layout')

@section('content')
  <h2>Lengkapi Data Anda</h2>

  <form action="{{ route('daftar.store') }}" method="POST">
    @csrf

    <div>
      <label>Nama Lengkap</label>
      <input type="text" name="nama" value="{{ old('nama') }}" required>
      @error('nama')
          <small style="color:red;">{{ $message }}</small>
      @enderror
    </div>

    <div>
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" required>
        <option value="">-- Pilih --</option>
        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
      @error('jenis_kelamin')
          <small style="color:red;">{{ $message }}</small>
      @enderror
    </div>

    <div>
      <label>Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required>
      @error('email')
          <small style="color:red;">{{ $message }}</small>
      @enderror
    </div>

    <div>
      <label>Nomor WhatsApp Aktif</label>
      <input type="text" name="no_whatsapp" value="{{ old('no_whatsapp') }}" required>
      @error('no_whatsapp')
          <small style="color:red;">{{ $message }}</small>
      @enderror
    </div>

    <div>
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
      @error('tanggal_lahir')
          <small style="color:red;">{{ $message }}</small>
      @enderror
    </div>
    <div>
      <label>Jenjang</label>
      <select name="jenjang" required>
        <option value="">-- Pilih Jenjang --</option>
        
        <optgroup label="SD">
            <option value="SD1">SD 1</option>
            <option value="SD2">SD 2</option>
            <option value="SD3">SD 3</option>
            <option value="SD4">SD 4</option>
            <option value="SD5">SD 5</option>
            <option value="SD6">SD 6</option>
        </optgroup>

        <optgroup label="SMP">
            <option value="SMP1">SMP 1</option>
            <option value="SMP2">SMP 2</option>
            <option value="SMP3">SMP 3</option>
        </optgroup>

        <optgroup label="SMA">
            <option value="SMA1">SMA 1</option>
            <option value="SMA2">SMA 2</option>
            <option value="SMA3">SMA 3</option>
        </optgroup>
      </select>
    </div>

    <div>
      <label>Password (minimal 6 karakter)</label>
      <input type="password" name="password" required>
      @error('password')
          <small style="color:red;">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit">Daftar Sekarang!</button>
  </form>
@endsection
