<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\PaintingRequest;
use App\Models\Artist;
use App\Models\Painting;
use App\Models\Style;
use App\Models\Material;
use App\Models\Technique;
use App\Models\Plot;


use Illuminate\Http\Request;

class PaintingController extends Controller
{
    public function index() {
        return view('admins.paintings.index', [
            'paintings' => Painting::all(),
        ]);
    }

    public function create() {
        return view('admins.paintings.create', [
            'styles' => Style::all(),
            'plots' => Plot::all(),
            'materials' => Material::all(),
            'techniques' => Technique::all(),
            'artists' => Artist::all(),
        ]);
    }

    public function store(PaintingRequest $request)
    {
        $path = FileService::upload($request->file('image'), '/paintings');

        Painting::create(array_merge(
            ['image' => $path],
            $request->except(['_token', 'image']),
        ));
        

        return to_route('admin.paintings.index');
    }

    public function destroy(Painting $painting) {
        if (FileService::delete($painting->image, '/public/paintings/')) {
            if($painting->delete()) {
                return back()->with(['message'=>'Товар успешно удален', 'category' => 'success']);
            }
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Painting $painting) {
        return view('admins.paintings.update', [
            'painting' => Painting::where('id', $painting->id)->first(),
            'styles' => Style::all(),
            'plots' => Plot::all(),
            'materials' => Material::all(),
            'techniques' => Technique::all(),
            'artists' => Artist::all(),
        ]);
    }

    public function update(PaintingRequest $request, Painting $painting) {
        if ($request->file('image')) {
            $newPath = FileService::update($painting->image, $request->file('image'), '/paintings/');

            if ($newPath) {
                if($painting->update(['image' => $newPath] + $request->except(['_token', 'image']))) {

                    return to_route('admin.paintings.index')->withErrors(['success' => 'Запись успешно обновлена']);
                }
            }
        } else {
            if($painting->update($request->except(['_token', 'image']))) {
                return to_route('admin.paintings.index')->withErrors(['success' => 'Запись успешно обновлена']);
            }
        }
        return back()->withErrors(['error' => 'Возникла ошибка при обновлении товара']);
    }

    public function getPaintingStyle(Style $style) {
        $paintings = Painting::all();

        if ($style->id) {
            $paintings = $paintings->where('style_id', $style->id);
        }

        return view('admins.paintings.index', ['paintings' => $paintings->all()]);
    }
}