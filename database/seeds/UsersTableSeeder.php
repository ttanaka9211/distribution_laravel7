<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            0 => [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => '2020-11-20 10:58:03',
                'password' => '$2y$10$X31bD/0awizBfvE/UKwo/OhCH4C.H5cgLYeEeuBo6nzOi3ad.70Zq',
                'role' => 1,
                'remember_token' => null,
                'created_at' => '2020-11-19 18:29:05',
                'updated_at' => '2020-11-20 10:58:03',
                'stripe_id' => null,
                'card_brand' => null,
                'card_last_four' => null,
                'trial_ends_at' => null,
                'deleted_at' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'test1',
                'email' => 'test1@example.com',
                'email_verified_at' => '2020-11-20 02:39:45',
                'password' => '$2y$10$dsb7cmqbCPQRyrzE2Fyvcu.Ah0Lu23//n34LIf.bA/EpDcfgOaBee',
                'role' => 0,
                'remember_token' => null,
                'created_at' => '2020-11-20 02:39:09',
                'updated_at' => '2020-11-20 02:39:45',
                'stripe_id' => null,
                'card_brand' => null,
                'card_last_four' => null,
                'trial_ends_at' => null,
                'deleted_at' => null,
            ],
            2 => [
                'id' => 3,
                'name' => 'test2',
                'email' => 'test2@example.com',
                'email_verified_at' => null,
                'password' => '$2y$10$YhcawWMt6.1alATdneEAD.bv37L.7FRcVTziiLlqwGqF4loMs5V42',
                'role' => 0,
                'remember_token' => null,
                'created_at' => '2020-11-20 02:48:34',
                'updated_at' => '2020-11-20 02:48:34',
                'stripe_id' => null,
                'card_brand' => null,
                'card_last_four' => null,
                'trial_ends_at' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
