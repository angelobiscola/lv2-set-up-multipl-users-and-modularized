<?php

use Illuminate\Database\Seeder;
use App\Domains\User\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
    }
}
