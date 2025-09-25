@extends('layouts.app')

@section('title', 'Materi')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($materi as $item)
    <div class="bg-orange-300 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">{{ $item->mapel->nama_mapel }}</h3>
        <p class="text-sm text-gray-600">{{ $item->mapel->jenjang }}</p>
        <p class="mt-4">
            <a href="{{ $item->content_url }}" target="_blank" class="text-green-700 hover:underline">
                Link Google Drive
            </a>
        </p>
    </div>
    @endforeach
</div>
@endsection
