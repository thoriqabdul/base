<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new = new App\User();
        $new->name = 'Thoriq';
        $new->email = 'thoriq@gmail.com';
        $new->password = bcrypt('secret');
        $new->save();


        $new = new App\User();
        $new->name = 'anjing';
        $new->email = 'anjing@gmail.com';
        $new->password = bcrypt('secret');
        $new->save();

    }
}
