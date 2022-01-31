<?php

use Illuminate\Database\Seeder;

class SystemUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('system_users')->truncate();

        DB::table('system_users')->insert([
            'fname' => 'Gimhani',
            'lname' => 'Weerasooriya',
            'dob' => '2000-01-08',
            'gender' => 'female',
            'email' => 'gimhani@gmail.com',
            'phone' => '0711234567',
            'password' => 'asdfghjk8',
            'created_at' => Date('Y-m-d H-i-s'),
            'updated_at' => Date('Y-m-d H-i-s'),
        ]);
    }
}
