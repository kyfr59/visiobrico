<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    public function index()
    {
        return view('prestataire.home');
    }

    public function profil()
    {
        return view('prestataire.profil');
    }

    public function propositions()
    {
        return view('prestataire.propositions');
    }

    public function recherche()
    {
        return view('prestataire.recherche');
    }
}
