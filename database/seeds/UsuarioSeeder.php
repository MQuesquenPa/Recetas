<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'juan',
            'email'=>'correo@correo.com',
            'password'=>Hash::make('12345678'),
            'url'=>'http://codigodejuan.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=>'pablo',
            'email'=>'correos@correos.com',
            'password'=>Hash::make('12345678'),
            'url'=>'http://codigodepablo.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

    }
}
