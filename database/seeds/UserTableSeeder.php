<?php

use App\User;
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
        User::create([
            'email' => 'christiansen.keira@example.org',
            'name' => 'Mr. Jamison Daniel DVM',
            'password' => bcrypt('password')
        ]);

        User::create([
            'email' => 'willard.bartell@example.net',
            'name' => 'Olga Funk Jr',
            'password' => bcrypt('password')
        ]);
    }
}
