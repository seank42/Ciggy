<?php

namespace Database\Seeders;

use App\models\User;
use App\models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// get the admin role from the role table. Later (line31) attach this role to a user
        $role_admin = Role::where('name','admin')->first();

 //get the user role from the role table. Later (line42) attach this to a user
        $role_user = Role::where('name','user')->first();


        $admin = new User();
        $admin->name = 'Sean Kearney';
        $admin->email = 'N00211599@iadt.ie';
        $admin->password = Hash::make('password');
        $admin->save();

//attach the admin role to the user that was created above
        $admin->roles()->attach($role_admin);

        $user = new User();
            $user->name = 'John Cena';
            $user->email = 'JohnCena@gmail.com';
            $user->password = Hash::make('password');
            $user->save();

// attach the user role to this user
        $user->roles()->attach($role_user);
    }
}
