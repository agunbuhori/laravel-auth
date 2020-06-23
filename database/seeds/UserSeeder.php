<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->name = "admin";
        $user->email = "admin@belajar.id";
        $user->email_verified_at = now();
        $user->password = bcrypt("Aczx26120roe");

        $user->save();
    }
}
