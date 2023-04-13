<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

use App\Models\Painting;
use App\Models\Plot;
use App\Models\Style;
use App\Models\Technique;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class PaintingController extends Controller
{
    public function index() {
        $paintings = Painting::with('artist')->latest('created_at')->take(4)->get();
        $plots = Plot::all();

        return view('main', compact('paintings', 'plots'));
    }

    public function paintings() {
        // $paintings = Painting::all()
        
        $plots = Plot::all();
        $styles = Style::all();
        $techniques = Technique::all();
        $materials = Material::all();

        return view('paintings.index', compact('plots', 'styles', 'techniques', 'materials'));
    }

    public function getAll(Request $request) {
        $parameters = $request->data['data'];

        $sortBy = isset($parameters['sortBy']) ? $parameters['sortBy'] : 'price';
        $typeSort = isset($parameters['typeSort']) ? $parameters['typeSort'] : 'asc';

        $currentPage = isset($parameters['currentPage']) ? $parameters['currentPage'] : 1;
        $limit = isset($parameters['limit']) ? $parameters['limit'] : 10;
        $offset = ($currentPage - 1) * $limit;


        $paintings = Painting::doesntHave('orderContent')->orderBy($sortBy, $typeSort)->with('artist', 'technique');

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
        $painting = Painting::where('id', $paintingId)->with('artist', 'technique', 'material', 'plot', 'style')->first();
        $otherPaintings = Painting::doesntHave('orderContent')->where('id', '!=', $painting->id)->where('artist_id', $painting->artist->id)->take(3)->get();
        
        
        return view('painting.index', compact('painting', 'otherPaintings', 'isBasket'));
    }
}