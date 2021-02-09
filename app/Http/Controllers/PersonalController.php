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
		Product::create($request->all() + ["user_id" => \Auth::user()->id]);
		return response()->json(
			[
				"message" => "se ha guardado con exito.",
			],
			200
		);
	}

	public function show(Product $personal)
	{
		return response()->json($personal, 200);
	}

	/**
	 * para actualizar, solo el administrador prodra realizarlo
	 * o si quien lo creo es el usuario autentificado
	 *
	 * @param PersonalRequest $request
	 * @param Product $personal
	 * @return void
	 */
	public function update(PersonalRequest $request, Product $personal)
	{
		$this->authorize("update", $personal);
		$personal->update($request->all());
		return response()->json(
			[
				"message" => "Se ha actualizado",
			],
			200
		);
	}
	/**
	 * a este metodo solo el administrador
	 * puede eliminimar
	 *
	 * @param Product $personal
	 * @return void
	 */
	public function destroy(Product $personal)
	{
		\Gate::authorize("hasRole", "admin"); //AuthorizationException | es lo que retorna si es falso
		$personal->delete();
		return response()->json(
			[
				"message" => "Se ha eliminado, con exito.",
			],
			200
		);
	}
}
