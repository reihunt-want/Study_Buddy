@extends('layouts.home_layout')

@section('content')
<section class="contact-section">
  <h2>📞 Hubungi Kami</h2>
  <p>Jika ada pertanyaan atau ingin konsultasi program belajar, silakan hubungi kami melalui form atau kontak di bawah ini.</p>

  <div class="contact-container">
    <!-- Form Kontak -->
    <div class="contact-form">
        @if(session('success'))
            <div class="alert alert-success" style="margin-bottom:15px; color: green;">
                {{ session('success') }}
            </div>
        @endif
      <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="pesan">Pesan</label>
          <textarea id="pesan" name="pesan" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn-kirim">Kirim Pesan</button>
      </form>
    </div>

    <!-- Info Kontak -->
    <div class="contact-info">
      <h3>📍 Alamat</h3>
      <p>Jl. Pendidikan No. 123, Jakarta</p>

      <h3>📱 WhatsApp</h3>
      <p>+62 812 3456 7890</p>

      <h3>📧 Email</h3>
      <p>studybuddy@gmail.com</p>
    </div>
  </div>
</section>
@endsection
