<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Painting;
use App\Models\Plot;
use App\Models\Style;
use App\Models\Technique;
use App\Models\Material;




class PaintingController extends Controller
{
    public function index() {
        $paintings = Painting::all();
        $plots = Plot::all();

        return view('main', compact('paintings', 'plots'));
    }

    public function paintings() {
        $paintings = Painting::all();
        $plots = Plot::all();
        $styles = Style::all();
        $techniques = Technique::all();
        $materials = Material::all();

        return view('paintings.index', compact('paintings', 'plots', 'styles', 'techniques', 'materials'));
    }

    public function getAll(Request $request) {
        $paintings = [];

        if ($request->data['data']['sortBy']) {
            $paintings = Painting::orderBy($request->data['data']['sortBy'], $request->data['data']['typeSort'])->get();
        }

        return $paintings;
    }
}