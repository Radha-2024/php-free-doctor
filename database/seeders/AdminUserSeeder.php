<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run()
{
    Admin::factory()->create([
        'name' => 'admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('00000000'),  // or Hash::make()
    ]);
}

}