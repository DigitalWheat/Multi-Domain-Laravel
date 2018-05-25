<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('admin.admin_email') && config('admin.admin_password')) {
            $user = User::firstOrCreate(
                ['email' => config('admin.admin_email')], [
                    'first_name' => config('admin.admin_first_name'),
                    'last_name' => config('admin.admin_last_name'),
                    'password' => bcrypt(config('admin.admin_password')),
                ]
            );
            $user->is_appadmin = 1;
            $user->save();
        }
    }
}
