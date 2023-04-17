<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index() {
        return view('admins.artists.index', [
            'artists' => Artist::all(),
        ]);
    }

    public function create() {
        return view('admins.artists.create');
    }

    public function store(ArtistRequest $request)
    {
        $path = FileService::upload($request->file('avatar'), '/artists/');

        Artist::create(array_merge(
            ['avatar' => $path],
            $request->except(['_token', 'avatar']),
        ));
        

        return to_route('admin.artists.index');
    }

    public function destroy(Artist $artist) {
        if (FileService::delete($artist->avatar, '/public/artists/')) {
            if($artist->delete()) {
                return back()->with(['message'=>'Художник успешно удален', 'category' => 'success']);
            }
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Artist $artist) {
        return view('admins.artists.update', [
            'artist' => $artist]);
    }

    public function update(ArtistRequest $request, Artist $artist) {
        if ($request->file('avatar')) {
            $newPath = FileService::update($artist->avatar, $request->file('avatar'), '/artists/');

            if ($newPath) {
                if($artist->update(['avatar' => $newPath] + $request->except(['_token', 'avatar']))) {

                    return to_route('admin.artists.index')->withErrors(['success' => 'Запись успешно обновлена']);
                }
            }
        } else {
            if($artist->update($request->except(['_token', 'avatar']))) {
                return to_route('admin.artists.index')->withErrors(['success' => 'Запись успешно обновлена']);
            }
        }
        return back()->withErrors(['error' => 'Возникла ошибка при обновлении товара']);
    }
}