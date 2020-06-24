<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role::create(['name' => 'superadmin']);
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'member']);

        $this->call(UserSeeder::class);
    }
}
