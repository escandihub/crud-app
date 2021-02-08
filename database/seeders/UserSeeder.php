<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(20)->create();
        $Roles = Role::all();

        $users->each(function($user) use($Roles) {
            $user->roles()->attach($Roles->random()->id);
        });
    }
}
