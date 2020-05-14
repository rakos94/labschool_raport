<?php

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'nis' => 1001,
            'name' => 'Siswanto',
            'password' => Hash::make('1111'),
        ]);
    }
}
