@extends('layouts.home_layout')

@section('content')
  <section class="hero">
    <h1>Tutor Online Terpercaya untuk Generasi Juara</h1>
    <p>Lorem Ipsum is simply dummy text...</p>
    <a href="{{ route('register.create') }}">Daftar Sekarang</a>
    <a href="{{ route('contact') }}">Konsultasi</a>
  </section>

  <section class="program">
    <h2>Program Kami</h2>
    <div>
      <h3>Sekolah Dasar (SD)</h3>
      <p>Belajar membaca, menulis, berhitung...</p>
    </div>
    <div>
      <h3>Sekolah Menengah Pertama (SMP)</h3>
      <p>Pemantapan konsep dasar dan persiapan ujian...</p>
    </div>
    <div>
      <h3>Sekolah Menengah Atas (SMA)</h3>
      <p>Persiapan UTBK, materi mendalam, strategi belajar...</p>
    </div>
  </section>
@endsection
