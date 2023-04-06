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

        $sortBy = isset($parameters['sortBy']) ? $parameters['sortBy'] : 'price';
        $typeSort = isset($parameters['typeSort']) ? $parameters['typeSort'] : 'asc';

        $currentPage = isset($parameters['currentPage']) ? $parameters['currentPage'] : 1;
        $limit = isset($parameters['limit']) ? $parameters['limit'] : 10;
        $offset = ($currentPage - 1) * $limit;


        $paintings = Painting::orderBy($sortBy, $typeSort)->with('artist', 'technique');

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

        $countPaintings = $paintings->count();

        $paintings->offset($offset)->limit($limit);

        return array_merge(['paintings' => $paintings->get()], ['countPaintings' => $countPaintings]);
    }

    public function painting(Request $request) {
        $paintingId = $_GET['id'];
    
        $painting = Painting::where('id', $paintingId)->with('artist', 'technique')->first();
        
        return view('painting.index', compact('painting'));
    }
}