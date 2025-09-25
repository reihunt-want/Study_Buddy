<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-green-700 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">STUDY BUDDY</h1>
        <nav class="flex space-x-4">
            <a href="{{ route('admin.students') }}" class="hover:text-gray-300">Manajemen Siswa</a>
            <a href="{{ route('admin.classes') }}" class="hover:text-gray-300">Manajemen Kelas</a>
            <a href="{{ route('admin.enrollments') }}" class="hover:text-gray-300">Manajemen Pendaftaran</a>
            <a href="{{ route('admin.tutors') }}" class="hover:text-gray-300">Manajemen Tutor</a>
            <a href="{{ route('admin.admins') }}" class="hover:text-gray-300">Manajemen Admin</a>
        </nav>
        <div>Halo, {{ Auth::user()->nama }}</div>
    </header>

    <div class="flex-1 p-8 bg-orange-500 min-h-screen">
        @yield('content')
    </div>

</body>
</html>