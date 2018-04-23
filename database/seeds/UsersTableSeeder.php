<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PicFoto\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->username= 'evalencia';
        $usuario->email='ezequielvalencia@gmail.com';
        $usuario->password=bcrypt('1234');
        $usuario->status=true;
        $usuario->save();
    }
}
