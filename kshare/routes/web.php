<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

// Pagina principal de la web.
// Usa HomeController porque el inicio no solo muestra HTML:
// tambien necesita recibir los ultimos anuncios publicados.
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de anuncios / marketplace.
// /listings muestra la pagina de anuncios.
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

// /listings/create muestra el formulario para crear un anuncio.
Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');

// POST /listings guarda el anuncio en la base de datos.
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');

// /listings/{listing} muestra el detalle de un anuncio concreto.
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

// Rutas de tradeos.
// De momento carga una vista estatica.
Route::view('/trades', 'trades.index')->name('trades.index');

// Paginas informativas que se abren desde el footer.
// Cada ruta carga directamente una vista Blade, sin controlador.
// Importante: para que funcionen deben existir:
// resources/views/support/faq.blade.php
// resources/views/support/contacto.blade.php
// resources/views/support/nosotros.blade.php
Route::view('/faq', 'support.faq')->name('faq');
Route::view('/contacto', 'support.contacto')->name('contacto');
Route::view('/nosotros', 'support.nosotros')->name('nosotros');
