<?php

namespace App\Http\Controllers;

use App\Models\pelicula;
use Illuminate\Http\Request;

class ApiPeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
		$query = Pelicula::query();
        //
        // Filtrar por director
        if ($request->has('director')) {
            $query->where('director', 'like', '%' . $request->input('director') . '%');
        }
		
		// Filtrar por genero
        if ($request->has('genero')) {
            $query->where('genero', 'like', '%' . $request->input('genero') . '%');
        }

        // Filtrar por fecha de estreno
        if ($request->has('estreno')) {
            $query->whereDate('fecha_estreno', $request->input('estreno'));
        }

       

        // Paginación

		 $perPage = $request->get('per_page', 10); // Número de elementos por página, valor por defecto es 10
        $peliculas = $query->paginate($perPage);
        return response()->json([
            "status" => true,
            "peliculas" => $peliculas
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
		$pelicula = pelicula::create($request->all());
		return response()->json([
        'status' => true,
        'message' => "Pelicula creada satisfactoriamente!",
        'pelicula' => $pelicula
    ], 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
		return pelicula::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
		$pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());
        return response()->json($pelicula, 200);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
		pelicula::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
