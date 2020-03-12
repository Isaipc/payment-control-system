<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    protected $table = 'users';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'email' => 'admin@hsys.com',
            'name' => 'admin0',
            'password' => bcrypt('_1q2w3e4R')
        ]);

        User::create([
            'email' => 'jun.devop.sys@gmail.com',
            'name' => 'dev0',
            'password' => bcrypt('Und3r5t4nD')
        ]);
    }
}
