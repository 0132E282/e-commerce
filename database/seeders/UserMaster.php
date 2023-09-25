<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserMaster extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin master',
            'email' => 'admin01@admin.com',
            'password' => Hash::make('123456'),
            'avatar_url' => 'https://www.pphfoundation.ca/wp-content/uploads/2018/05/default-avatar-600x600.png'
        ]);
    }
}
