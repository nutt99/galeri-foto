<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('nata123'),
            'email' => 'nata@gmail.com',
            'nama_lengkap' => 'chrisdinata',
            'alamat' => 'komplek perumahan srigunting',
        ]);


        DB::table('penggunas')->insert([
            'username' => 'fardan',
            'password' => Hash::make('fardan123'),
            'email' => 'fardan@gmail.com',
            'nama_lengkap' => 'fardan muhammad fiksa',
            'alamat' => 'komplek perumahan srigunting',
        ]);

         DB::table('albums')->insert([
             'nama_album' => "gabut aja",
             'deskripsi' => "buat folower aku <3",
             'userid' => 1,
             'visibilitas' => 'publik' 
         ]);
         DB::table('albums')->insert([
            'nama_album' => "tes album",
            'deskripsi' => "buat folower aku <3",
            'userid' => 1,
            'visibilitas' => 'publik' 
        ]);
        DB::table('albums')->insert([
            'nama_album' => "tes album2",
            'deskripsi' => "buat folower aku <3",
            'userid' => 1,
            'visibilitas' => 'publik' 
        ]);
        DB::table('albums')->insert([
            'nama_album' => "tes album3",
            'deskripsi' => "buat folower aku <3",
            'userid' => 1,
            'visibilitas' => 'publik' 
        ]);
        DB::table('albums')->insert([
            'nama_album' => "tes album4",
            'deskripsi' => "buat folower aku <3",
            'userid' => 1,
            'visibilitas' => 'publik' 
        ]);
        DB::table('albums')->insert([
            'nama_album' => "asdkasdaklsmdklamdkamsdklamkdmaksdmanjksdnjkansjndjkansdjasjnfkjsndfjkdanfafjknajfndjad",
            'deskripsi' => "buat folower aku <3",
            'userid' => 1,
            'visibilitas' => 'publik' 
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
