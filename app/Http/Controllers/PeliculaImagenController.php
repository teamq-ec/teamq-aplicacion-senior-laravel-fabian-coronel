<?php

namespace App\Http\Controllers;
use App\Models\pelicula;
use Illuminate\Http\Request;

class PeliculaImagenController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);
		$pelicula = Pelicula::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($pelicula->image) {
                Storage::disk('public')->delete('peliculas/' . $pelicula->image);
            }
            $path = $request->file('image')->store('peliculas/' . uniqid(), 'public');
            $pelicula->image = basename($path);

            $pelicula->save();

            return response()->json(['message' => 'Image uploaded successfully.', 'image_url' => url('storage/peliculas/' . $pelicula->image)], 201);
        }

        return response()->json(['message' => 'Image upload failed.'], 400);
    }

    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::disk('public')->delete('movies/' . $movie->image);
            $movie->image = null;
            $movie->save();

            return response()->json(['message' => 'Image deleted successfully.'], 200);
        }

        return response()->json(['message' => 'No image found.'], 404);
    }
	 public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        //$pelicula->image_url = $pelicula->image ? url('storage/peliculas/' . $pelicula->image) : null;
        return response()->json($pelicula);
    }
}