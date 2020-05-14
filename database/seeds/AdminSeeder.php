<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'username' => 'admin',
            'name' => 'Admin',
            'password' => Hash::make('admin'),
            'is_super' => true,
        ]);
    }
}
