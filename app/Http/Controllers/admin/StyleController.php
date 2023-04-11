<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StyleRequest;
use App\Models\Plot;

use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index() {
        return view('admins.styles.index', [
            'styles' => Style::all(),
        ]);
    }

    public function create() {
        return view('admins.styles.create', [
            'styles' => Style::all(),
        ]);
    }

    public function store(PlotRequest $request)
    {
        Style::create($request->only(
            ['name']
        ));
        
        return to_route('admin.styles.index');
    }

    public function destroy(Style $plot) {
        if($plot->delete()) {
            return back()->with(['message'=>'Товар успешно удален']);
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Style $style) {
        return view('admins.styles.update', [
            'plot' => $style,
        ]);
    }

    public function update(StyleRequest $request, Style $style) {
        if($style->update($request->except(['_token']))) {
            return to_route('admin.styles.index');
        }
        return back();
    }
}