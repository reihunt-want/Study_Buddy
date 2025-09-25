@extends('layouts.home_layout')

@section('content')
<section class="pricing-form">
  <h2>📚 Daftar & Belajar Bersama Study Buddy</h2>

  <form action="{{ route('register.create') }}" method="GET">
    @csrf

    <div class="form-group">
      <label for="jenjang">Jenjang</label>
      <select id="jenjang" name="jenjang" required>
        <option value="">-- Pilih Jenjang --</option>
        <option value="SD">SD</option>
        <option value="SMP">SMP</option>
        <option value="SMA">SMA</option>
      </select>
    </div>

    <div class="form-group">
      <label for="mapel">Mata Pelajaran</label>
      <select id="mapel" name="mapel" required>
        <option value="">-- Pilih Mata Pelajaran --</option>
        <option value="Matematika">Matematika</option>
        <option value="IPA">IPA</option>
        <option value="Bahasa Inggris">Bahasa Inggris</option>
      </select>
    </div>

    <div class="form-group">
      <label for="periode">Periode Program</label>
      <select id="periode" name="periode" required>
        <option value="">-- Pilih Periode --</option>
        <option value="1 Bulan">1 Bulan</option>
        <option value="3 Bulan">3 Bulan</option>
        <option value="6 Bulan">6 Bulan</option>
      </select>
    </div>

    <div class="form-group">
      <label for="sesi">Sesi</label>
      <select id="sesi" name="sesi" required>
        <option value="">-- Pilih Sesi --</option>
        <option value="1">1</option>
        <option value="2">2</option>

      </select>
    </div>

    <div class="total-harga">
      <p>Total Harga</p>
      <h3>RP. XXX /Bulan</h3>
    </div>

    <button type="submit" class="btn-daftar">Mulai Belajar</button>
  </form>
</section>
@endsection
