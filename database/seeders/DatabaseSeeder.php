<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('penggunas')->insert([
            'username' => 'nata',
            'password' => 'nata123',
            'email' => 'nata@gmail.com',
            'nama_lengkap' => 'chrisdinata',
            'alamat' => 'komplek perumahan srigunting',
        ]);


        DB::table('penggunas')->insert([
            'username' => 'fardan',
            'password' => 'fardan123',
            'email' => 'fardan@gmail.com',
            'nama_lengkap' => 'fardan muhammad fiksa',
            'alamat' => 'komplek perumahan srigunting',
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
