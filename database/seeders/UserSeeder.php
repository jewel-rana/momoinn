<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $role = Role::where('name', 'admin')->first();
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456789'),
            'mobile' => '01911785317',
            'email_verified_at' => now(),
            'role_id' => $role->id
        ]);
        $user->assignRole($role);
    }
}
