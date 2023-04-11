<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    public function index() {
        return view('admins.plots.index', [
            'plots' => Plot::all(),
        ]);
    }

    public function create() {
        return view('admins.plots.create', [
            'plots' => Plot::all(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Plot::create($request->only(
            ['name']
        ));
        
        return to_route('admin.plots.index');
    }

    public function destroy(Plot $category) {
        if($category->delete()) {
            return back()->with(['message'=>'Товар успешно удален']);
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Plot $category) {
        return view('admins.plots.update', [
            'category' => $category,
        ]);
    }

    public function update(PlotRequest $request, plot $category) {
        if($category->update($request->except(['_token']))) {
            return to_route('admin.plots.index');
        }
        return back();
    }
}