<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index() {
        return view('admins.materials.index', [
            'materials' => Material::all(),
        ]);
    }

    public function create() {
        return view('admins.materials.create', [
            'materials' => Material::all(),
        ]);
    }

    public function store(MaterialRequest $request)
    {
        Material::create($request->only(
            ['name']
        ));
        
        return to_route('admin.materials.index');
    }

    public function destroy(Material $material) {
        if($material->delete()) {
            return back()->with(['message'=>'Материал успешно удален']);
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Material $material) {
        return view('admins.materials.update', [
            'material' => $material,
        ]);
    }

    public function update(MaterialRequest $request, Material $material) {
        if($material->update($request->except(['_token']))) {
            return to_route('admin.materials.index');
        }
        return back();
    }
}