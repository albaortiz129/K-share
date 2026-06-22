<?php

use Illuminate\Support\Facades\Route;


//Pagina principal
Route::get('/', fn() => view('home.index'))->name('home');

//Paginas del footer
Route::view('/faq','support.faq')->name('faq');
Route::view('/contacto','support.contacto')->name('contacto');
Route::view('/nosotros','support.nosotros')->name('nosotros');
