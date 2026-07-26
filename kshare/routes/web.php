<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Paginas informativas que se abren desde el footer.
// Cada ruta carga directamente una vista Blade, sin controlador.
// Importante: para que funcionen deben existir:
// resources/views/support/faq.blade.php
// resources/views/support/contacto.blade.php
// resources/views/support/nosotros.blade.php
Route::view('/faq','support.faq')->name('faq');
Route::view('/contacto','support.contacto')->name('contacto');
Route::view('/nosotros','support.nosotros')->name('nosotros');

// Pagina principal de la web.
// Usa HomeController porque el inicio no solo muestra HTML:
// tambien necesita recibir los ultimos anuncios publicados.
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pagina donde se mostraran los intercambios entre usuarios.
// De momento carga una vista estatica.
Route::view('/trades', 'trades.index')->name('trades.index');

// Pagina donde se crearan o listaran anuncios del marketplace.
// De momento carga una vista estatica.
Route::view('/listings','listings.index')->name('listings.index');
