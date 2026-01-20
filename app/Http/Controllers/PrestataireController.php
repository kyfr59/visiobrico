<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    public function index()
    {
        return view('prestataire.home');
    }
}
