<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Painting;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index() {
        $artists = Artist::all();

        return view('main', compact('artists'));
    }

    public function artists(Request $request) {
        // $artists = Painting::all()
        
        $artists = Artist::all();

        return view('artists.index', compact('artists'));
    }

    public function getAll(Request $request) {
        $parameters = $request->data['data'];

        $currentPage = isset($parameters['currentPage']) ? $parameters['currentPage'] : 1;
        $limit = isset($parameters['limit']) ? $parameters['limit'] : 10;
        $offset = ($currentPage - 1) * $limit;


        $countArtists = Artist::all()->count();

        $artists = Artist::offset($offset)->limit($limit);
        
        return array_merge(['artists' => $artists->get()], ['countArtists' => $countArtists]);
    }

    public function artist(Request $request) {
        $artistId = $_GET['id'];

        $artist = Artist::where('id', $artistId)->first();
        $paintings = Painting::where('artist_id', $artist->id)->get();
        
        
        return view('artist.index', compact('artist', 'paintings'));
    }
}