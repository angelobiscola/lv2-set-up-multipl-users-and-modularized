<?php

use Illuminate\Database\Seeder;
use App\Domains\User\User;
use App\Domains\User\Profile;
use App\Domains\Location\Location;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(['first_name' => 'User', 'last_name' =>'Test', 'email' => 'user@user.com', 'password' => '$2y$10$aed.8U8IDT89uztJw2abLuVOKYfGff06jKOAcvIjwJEky/a8wlV.W','player' => true]);


        factory(User::class, 10)
            ->create()
            ->each(function($u)
            {
                $u
                  ->Profile()->save(factory(Profile::class)->make());
            });
    }
}
