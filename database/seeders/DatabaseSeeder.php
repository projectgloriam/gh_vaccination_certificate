<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Admin::factory(1)->create();

        // \App\Models\Admin::factory()->create([
        //     'fullname' => 'Administrator',
        //     'email' => 'admin@ghanavaccination.com',
        //     'password' => password_hash('admin', PASSWORD_DEFAULT)
        // ]);
    }
}
