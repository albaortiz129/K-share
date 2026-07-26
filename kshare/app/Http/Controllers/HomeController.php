<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

// Este controlador prepara los datos que necesita la pagina de inicio.
// La vista home.index se encarga de pintar el HTML, pero el controlador
// decide que informacion llega a esa vista.
class HomeController extends Controller
{
    public function index()
    {
        // Busca los ultimos anuncios que aun no estan vendidos.
        // with(['photocard', 'user']) carga tambien la carta y el usuario
        // relacionados con cada anuncio, para poder usarlos en la vista.
        $latestListings = Listing::with(['photocard', 'user'])
            ->where('is_sold', false)
            ->latest()
            ->take(5)
            ->get();

        // Envia la variable $latestListings a resources/views/home/index.blade.php.
        return view('home.index', compact('latestListings'));
    }
}
