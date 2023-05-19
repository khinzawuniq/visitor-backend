<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
        	'name' => 'Super Admin', 
        	'email' => 'superadmin@admin.com',
            'password' => bcrypt('@dmin123'),
        ]);
    }
}
