<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // untuk Query Builder
use App\Models\Game;

class GameController extends Controller
{
    // Menampilkan daftar game dan fitur pencarian
    public function index(Request $request)
{
    $search = $request->input('search');

    $games = DB::table('games')
        ->when($search, function($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('price', 'like', "%{$search}%"); // mencari di kolom price juga
        })
        ->get();

    return view('games.index', compact('games', 'search'));
}


    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        Game::create($request->only('title', 'price'));

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $game->update($request->only('title', 'price'));

        return redirect()->route('games.index')->with('success', 'Game berhasil diupdate!');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game berhasil dihapus!');
    }
}
