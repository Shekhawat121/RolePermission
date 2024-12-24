<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'Ankit Singh', 
            'email' => 'ankit@yopmail.com',
            'password' => bcrypt('Ankit@123')
        ]);
        $role = Role::where('name' , 'User')->first();
        $user->assignRole($role->id);

    }
}
