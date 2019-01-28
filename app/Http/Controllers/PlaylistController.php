<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistController extends Controller
{
  public function index($playlistId = null)
  {
    $playlists = DB::table('playlists')->get();

    if ($playlistId) {
      $tracks = DB::table('tracks')
        ->join('playlist_track', 'tracks.TrackId', '=', 'playlist_track.TrackId')
        ->where('PlaylistId', '=', $playlistId)
        ->get();
    } else {
      $tracks = [];
    }

    return view('playlist.index', [
      'playlists' => $playlists,
      'tracks' => $tracks
    ]);
  }

  public function create()
  {
    return view('playlist.create');
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|min:5|unique:playlists,Name'
    ]);

    if ($validator->fails()) {
      return redirect('/playlists/new')
        ->withErrors($validator)
        ->withInput();
    }

    DB::table('playlists')->insert([
      'Name' => $request->name
    ]);

    return redirect('/playlists');
  }
}
