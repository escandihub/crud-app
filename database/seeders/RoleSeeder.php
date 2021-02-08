<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$roles = [
			[
				"name" => "Administrador",
				"description" => "Administrador del sistema",
				"full_access" => "yes",
				"slug" => "admin",
			],
			[
				"name" => "Personal",
				"description" => "Personal del sistema",
				"full_access" => "no",
				"slug" => "personal",
			],
		];

		foreach ($roles as $role) {
			Role::create($role);
		}
	}
}
