<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

//creqamos un usuario antes de que se ejecute el factory
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Melvin Fernando',
            'email' => 'fernandogutierres801@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('mnfogt'), // password
            'DNI'=> '1001200000192',
            'direccion'=> 'Intibuca',
            'telefono'=> '95487537',
            'rol' => 'TecAdmin',
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
