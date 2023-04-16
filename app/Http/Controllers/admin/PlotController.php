<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\PlotRequest;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    public function index() {
        return view('admins.plots.index', [
            'plots' => Plot::all(),
        ]);
    }

    public function create() {
        return view('admins.plots.create');
    }

    public function store(PlotRequest $request)
    {
        $path = FileService::upload($request->file('image'), '/plots/');

        Plot::create(array_merge(
            ['image' => $path],
            $request->except(['_token', 'image']),
        ));
        

        return to_route('admin.paintings.index');
    }

    public function destroy(Plot $plot) {
        if (FileService::delete($plot->image, '/public/plots/')) {
            if($plot->delete()) {
                return back()->with(['message'=>'Товар успешно удален', 'category' => 'success']);
            }
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Plot $plot) {
        return view('admins.plots.update', [
            'plot' => Plot::where('id', $plot->id)->first()
        ]);
    }

    public function update(PlotRequest $request, Plot $plot) {
        if ($request->file('image')) {
            $newPath = FileService::update($plot->image, $request->file('image'), '/plots/');

            if ($newPath) {
                if($plot->update(['image' => $newPath] + $request->except(['_token', 'image']))) {

                    return to_route('admin.plots.index')->withErrors(['success' => 'Запись успешно обновлена']);
                }
            }
        } else {
            if($plot->update($request->except(['_token', 'image']))) {
                return to_route('admin.plots.index')->withErrors(['success' => 'Запись успешно обновлена']);
            }
        }
        return back()->withErrors(['error' => 'Возникла ошибка при обновлении товара']);
    }
}