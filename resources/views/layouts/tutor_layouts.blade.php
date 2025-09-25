<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Buddy - Tutor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-orange-600">
    <div class="flex h-screen">
        <div class="w-1/4 bg-yellow-100 p-8 shadow-lg">
            <h1 class="text-2xl font-bold mb-8">{{ Auth::user()->nama }}</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('tutor.profile') }}" class="flex items-center text-gray-700 hover:text-orange-500">
                            <span class="mr-2">👤</span> Profil
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('tutor.classes') }}" class="flex items-center text-gray-700 hover:text-orange-500">
                            <span class="mr-2">🧑‍🏫</span> Kelas
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('tutor.materials') }}" class="flex items-center text-gray-700 hover:text-orange-500">
                            <span class="mr-2">📚</span> Materi
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="flex-1 p-10 overflow-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-white text-3xl font-bold">STUDY BUDDY</h1>
                <div class="flex items-center text-white">
                    <span class="mr-2">Halo, {{ Auth::user()->nama }}</span>
                    <span class="p-2 rounded-full bg-yellow-500 text-white">👤</span>
                </div>
            </div>
            <div class="bg-orange-800 p-8 rounded-lg shadow-xl text-white">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>