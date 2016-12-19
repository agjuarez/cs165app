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
      DB::table('users')->insert([
                  'username' => 'admin',
                  'firstname' => 'admin',
                  'lastname' => 'admin',
                  'contactnumber' => '09123456789',
                  'Address' => 'Address',
                  'email' => 'admin@mail.com',
                  'role' => '1',
                  'password' => bcrypt('password'),
              ]);    }
}
