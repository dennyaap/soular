<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StyleRequest;
use App\Models\Style;
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

    public function store(StyleRequest $request)
    {
        Style::create($request->only(
            ['name']
        ));
        
        return to_route('admin.styles.index');
    }

    public function destroy(Style $style) {
        if($style->delete()) {
            return back()->with(['message'=>'Стиль успешно удален']);
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Style $style) {
        return view('admins.styles.update', [
            'style' => $style,
        ]);
    }

    public function update(StyleRequest $request, Style $style) {
        if($style->update($request->except(['_token']))) {
            return to_route('admin.styles.index');
        }
        return back();
    }
}