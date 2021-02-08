<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product; //es un producto 
use App\Http\Requests\PersonalRequest;

class PersonalController extends Controller
{
    public function index(Type $var = null)
    {
        return response()->json(Product::all(), 200);
    }

    public function store(PersonalRequest $request)
    {
        // \Gate::authorize('hasRole', "alumno");
        
        Product::create($request->all());
        return response()->json([
            'message' => "se ha guardado con exito."
        ], 200);
    }

    public function show(Product $personal)
    {
        return response()->json($personal, 200);
    }
    public function update(PersonalRequest $request, Product $personal)
    {
        $personal->update($request->all());
        return response()->json([
            'message' => 'Se ha actualizado'
        ], 200);
    }
    public function destroy(Product $personal)
    {
        $personal->delete();
        return response()->json([
            'message' => 'Se ha eliminado, con exito.'
        ], 200);
    }
}
