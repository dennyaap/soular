<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechniqueRequest;
use App\Models\Technique;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{
    public function index() {
        return view('admins.techniques.index', [
            'techniques' => Technique::all(),
        ]);
    }

    public function create() {
        return view('admins.techniques.create', [
            'techniques' => Technique::all(),
        ]);
    }

    public function store(TechniqueRequest $request)
    {
        Technique::create($request->only(
            ['name']
        ));
        
        return to_route('admin.techniques.index');
    }

    public function destroy(Technique $technique) {
        if($technique->delete()) {
            return back()->with(['message'=>'Товар успешно удален']);
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Technique $technique) {
        return view('admins.techniques.update', [
            'technique' => $technique,
        ]);
    }

    public function update(TechniqueRequest $request, Technique $technique) {
        if($technique->update($request->except(['_token']))) {
            return to_route('admin.techniques.index');
        }
        return back();
    }
}