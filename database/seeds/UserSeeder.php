<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User;

        // $user->name = "Super Admin";
        // $user->email = "superadmin@madinah.id";
        // $user->email_verified_at = now();
        // $user->password = bcrypt("Aczx26120roe");

        // $user->save();

        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'member']);

        // $user->assignRole('superadmin');
    }
}
