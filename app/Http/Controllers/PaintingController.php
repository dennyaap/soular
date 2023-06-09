<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

use App\Models\Painting;
use App\Models\Plot;
use App\Models\Style;
use App\Models\Technique;
use App\Models\Material;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaintingController extends Controller
{
    public function index() {
        $basketPaintings = auth()->check() ? Basket::getBasket()->select('painting_id')->get() : [];
        $paintings = Painting::doesntHave('orderContent')->with('artist')->whereNotIn('id', $basketPaintings)->latest('created_at')->take(4)->get();
        $plots = Plot::all();

        return view('main', compact('paintings', 'plots'));
    }

    public function paintings(Request $request) {
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

        $basketPaintings = auth()->check() ? Basket::getBasket()->select('painting_id')->get() : [];
        
        $paintings = Painting::doesntHave('orderContent')->orderBy($sortBy, $typeSort)->with('artist', 'technique')->whereNotIn('id', $basketPaintings);

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
        if (isset($parameters['artistId'])) {
            $paintings->where('artist_id', $parameters['artistId']);
        }

        $countPaintings = $paintings->count();

        $paintings->offset($offset)->limit($limit);

        return array_merge(['paintings' => $paintings->get()], ['countPaintings' => $countPaintings]);
    }

    public function painting(Request $request) {
        $paintingId = $_GET['id'];
        $isAuth = Auth::check();
        $isBasket = auth()->user() && Basket::getPaintingById($paintingId);

        $painting = Painting::where('id', $paintingId)->with('artist', 'technique', 'material', 'plot', 'style')->first();
        $otherPaintings = Painting::doesntHave('orderContent')->where('id', '!=', $painting->id)->where('artist_id', $painting->artist->id)->take(3)->get();
        
        
        return view('painting.index', compact('painting', 'otherPaintings', 'isBasket', 'isAuth'));
    }

}