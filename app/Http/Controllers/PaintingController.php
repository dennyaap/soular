<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Painting;
use App\Models\Plot;


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

        return view('paintings.index', compact('paintings', 'plots'));
    }
}