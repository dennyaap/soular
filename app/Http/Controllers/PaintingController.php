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
        $parameters = $request->data['data'];

        $paintings = [];

        if (!empty($parameters['sortBy'])) {
            $paintings = Painting::orderBy($parameters['sortBy'], $parameters['typeSort'])->with('artist');
        }
        if (!empty($parameters['stylesId'])) {
            $paintings->whereIn('style_id', $parameters['stylesId']);
        }
        if (!empty($parameters['plotsId'])) {
            $paintings->whereIn('plot_id', $parameters['plotsId']);
        }
        if (!empty($parameters['techniquesId'])) {
            $paintings->whereIn('techniques_id', $parameters['techniquesId']);
        }
        if (!empty($parameters['materialsId'])) {
            $paintings->whereIn('material_id', $parameters['materialsId']);
        }

        return json_decode($paintings->get());
    }
}