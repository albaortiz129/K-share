<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Photocard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ListingController extends Controller
{
    /**
     * Muestra la pagina principal de anuncios.
     */
    public function index()
    {
        $listings = Listing::with(['photocard', 'user'])
            ->where('is_sold', false)
            ->latest()
            ->get();

        return view('listings.index', compact('listings'));
    }

    /**
     * Muestra el formulario para crear un anuncio.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Guarda un anuncio nuevo.
     *
     * Primero crea la photocard y despues crea el anuncio asociado
     * a esa photocard. De momento user_id es temporal hasta tener login.
     */
    public function store(Request $request)
    {
        // Valida los datos que llegan desde resources/views/listings/create.blade.php.
        $validated = $request->validate([
            'group_name' => ['required', 'string', 'max:255'],
            'idol_name' => ['required', 'string', 'max:255'],
            'rarity' => ['required', 'string', 'max:255'],
            'album_era' => ['required', 'string', 'max:255'],
            'image_url' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        // Crea la carta que se va a anunciar.
        $photocard = Photocard::create([
            'group_name' => $validated['group_name'],
            'idol_name' => $validated['idol_name'],
            'rarity' => $validated['rarity'],
            'album_era' => $validated['album_era'],
            'image_url' => $validated['image_url'],
        ]);

        // Usuario temporal para poder probar anuncios antes de tener login.
        // Cuando exista autenticacion, este bloque se cambiara por auth()->id().
        $userId = auth()->id();

        if (!$userId) {
            $userId = User::firstOrCreate(
                ['email' => 'demo@kshare.test'],
                [
                    'username' => 'usuario_temporal',
                    'name' => 'Usuario temporal',
                    'password' => Hash::make('password'),
                ]
            )->id;
        }

        // Crea el anuncio usando la carta creada arriba.
        Listing::create([
            'user_id' => $userId,
            'photocard_id' => $photocard->id,
            'price' => $validated['price'],
            'currency' => 'EUR',
            'description' => $validated['description'] ?? null,
            'is_sold' => false,
        ]);

        // Redirige al inicio para ver el anuncio dentro de "Novedades".
        return redirect()->route('home');
    }

    /**
     * Muestra el detalle de un anuncio concreto.
     *
     * Laravel recibe el id de la URL /listings/{listing} y busca
     * automaticamente el Listing correspondiente.
     */
    public function show(Listing $listing)
    {
        // Carga la photocard y el usuario para poder mostrarlos en la vista.
        $listing->load(['photocard', 'user']);

        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
