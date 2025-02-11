<?php

namespace App\Http\Controllers;

use App\Models\Critter;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    public function index()
    {
        $critters = Critter::inRandomOrder()->limit(3)->get();

        return view('welcome', compact('critters'));
    }

    public function howto()
    {

        return view('howToUse');
    }
}
