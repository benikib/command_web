<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // L'admin est lié à l'utilisateur créé dans UserSeeder
        Admin::create([
            'user_id' => 1,
        ]);
    }
}
