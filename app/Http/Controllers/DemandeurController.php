<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeurController extends Controller
{
    public function index()
    {
        return view('demandeur.home');
    }
}
