<?php

use Illuminate\Database\Seeder;
use App\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@share.com',
                'is_admin' => '1',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'topan',
                'email' => 'topan@share.com',
                'is_admin' => '1',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'user',
                'email' => 'user@share.com',
                'is_admin' => '0',
                'password' => bcrypt('secret'),
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
