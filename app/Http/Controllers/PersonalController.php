<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personal;

class PersonalController extends Controller
{
    public function index(Type $var = null)
    {
        return response()->json(Personal::all(), 200);
    }

    public function store(Request $request)
    {
        Personal::create($request->all());
        return response()->json([
            'message' => "se ha guardado con exito."
        ], 200);
    }

    public function show(Personal $personal)
    {
        return response()->json($personal, 200);
    }
    public function update(Request $request, Personal $personal)
    {
        $personal->update($request->all());
        return response()->json([
            'message' => 'Se ha actualizado'
        ], 200);
    }
    public function delete(Personal $personal)
    {
        $personal->delete();
        return response()->json([
            'message' => 'Se ha eliminado, con exito.'
        ], 200);
    }
}
