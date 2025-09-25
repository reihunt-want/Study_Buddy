@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-center text-white text-3xl font-bold">
    Halo, {{ Auth::user()->nama }}! Mau belajar apa ini?
</div>
@endsection