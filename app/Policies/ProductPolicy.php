<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\Response;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	public function before(User $user)
	{
		if ($user->findRole("admin")) {
			return true;
		}
	}
	public function update(User $user, Product $product)
	{
		// $isAdmin = \Gate::allows("hasRole", "admin");
		$ownProduct = $user->id === $product->user_id;
		return $ownProduct
			? Response::allow()
			: Response::deny("El producto no es de su propiedad.");
	}
}
