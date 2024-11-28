<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use illuminate\Support\Carbon;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('cover_art')) {
            $url = Storage::put('games', $request->file('cover_art'));
        } else {
            $url = '';
        }

        DB::table('games')->insert([
            'title' => $request->title,
            'cover_art' => $url,
            'developer' => $request->developer,
            'release_year' => $request->release_year,
            'genre' => $request->genre,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('games.index');
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        if ($request->hasFile('cover_art')) {
            if ($game->cover_art) {
                Storage::disk('public')->delete($game->cover_art);
            }
            $url = Storage::put('games', $request->file('cover_art'));
        } else {
            $url = $game->cover_art;
        }

        DB::table('games')->where('id', $id)->update([
            'title' => $request->title,
            'cover_art' => $url,
            'developer' => $request->developer,
            'release_year' => $request->release_year,
            'genre' => $request->genre,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('games.index')->with('success', 'Success');
    }

    public function destroy($id)
    {
        DB::table('games')->where('id', $id)->delete();
        return back();
    }
}
