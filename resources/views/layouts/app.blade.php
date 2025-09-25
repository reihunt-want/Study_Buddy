<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Buddy - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-green-700 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">STUDY BUDDY</h1>
        <div>Halo, {{ Auth::user()->nama }}</div>
    </header>

    <div class="flex">
        <aside class="w-64 p-4 bg-orange-400 min-h-screen">
            <div class="mb-6 pb-4 border-b border-dashed border-gray-600">
                <p class="font-semibold text-lg">{{ Auth::user()->nama }}</p>
                <p class="text-sm">{{ Auth::user()->siswa->jenjang }}</p>
            </div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('students.dashboard') }}" class="block p-2 rounded @if(request()->routeIs('students.dashboard')) bg-orange-500 @endif">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('students.profile') }}" class="block p-2 rounded @if(request()->routeIs('students.profile')) bg-orange-500 @endif">Profil Saya</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('students.materi') }}" class="block p-2 rounded @if(request()->routeIs('students.materi')) bg-orange-500 @endif">Materi</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('students.classes') }}" class="block p-2 rounded @if(request()->routeIs('students.classes')) bg-orange-500 @endif">Kelas</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-8 bg-orange-500">
            @yield('content')
        </main>
    </div>

</body>
</html>