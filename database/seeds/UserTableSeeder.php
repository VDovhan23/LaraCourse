<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data  = [
            [

                'name'       =>'unknown',
                'email'      =>'unknown@gmail.com',
                'password'   => bcrypt(str_random(16))
            ],
            [
                'name'       =>'waselews',
                'email'      =>'waselews1@gmail.com',
                'password'   => bcrypt(11223344)
            ]
        ];

        DB::table('users')->insert($data);
    }
}
