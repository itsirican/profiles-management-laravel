<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::factory(200)->create();
        // Profile::factory()->create([
        //     'name' => 'Abdel',
        //     'email' => 'email@email.com',
        //     'password' => 'pass@123',
        //     'bio' => 'description...'
        // ]);
    }
}