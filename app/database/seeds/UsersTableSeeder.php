<?php
/**
 * Created by PhpStorm.
 * User: Bluesky_PC
 * Date: 5/16/14
 * Time: 10:21 AM
 */

class UsersTableSeeder extends Seeder {


    public function run () {
        Eloquent::unguard();
        DB::table('users')->truncate();
        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'admin' => true,
            'user' => true,
            'active' => 'true',
        ]);

    }
} 