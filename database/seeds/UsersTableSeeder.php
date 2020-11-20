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
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-19 18:29:05',
                'deleted_at' => null,
                'email' => 'admin@example.com',
                'email_verified_at' => '2020-11-20 10:58:03',
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$X31bD/0awizBfvE/UKwo/OhCH4C.H5cgLYeEeuBo6nzOi3ad.70Zq',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 10:58:03',
            ],
            1 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 02:39:09',
                'deleted_at' => null,
                'email' => 'test1@example.com',
                'email_verified_at' => '2020-11-20 02:39:45',
                'id' => 2,
                'name' => 'test1',
                'password' => '$2y$10$dsb7cmqbCPQRyrzE2Fyvcu.Ah0Lu23//n34LIf.bA/EpDcfgOaBee',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 02:39:45',
            ],
            2 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 02:48:34',
                'deleted_at' => null,
                'email' => 'test2@example.com',
                'email_verified_at' => null,
                'id' => 3,
                'name' => 'test2',
                'password' => '$2y$10$YhcawWMt6.1alATdneEAD.bv37L.7FRcVTziiLlqwGqF4loMs5V42',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 02:48:34',
            ],
            3 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 02:49:47',
                'deleted_at' => null,
                'email' => 'test3@example.com',
                'email_verified_at' => '2020-11-20 02:50:04',
                'id' => 4,
                'name' => 'test3',
                'password' => '$2y$10$tAh/VK1eBgSjMdGKp78XNOiKbjirtVBRXIrJpgzV4hJWIy1cbQAPq',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 02:50:04',
            ],
            4 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 11:02:31',
                'deleted_at' => null,
                'email' => 'test4@example.com',
                'email_verified_at' => '2020-11-20 11:03:03',
                'id' => 5,
                'name' => 'test4',
                'password' => '$2y$10$nfgLnGzXutv0g74K3IgyNe3UPM9szsjCFgBteoRMLMtTphKDGQEAm',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 11:03:03',
            ],
            5 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 11:15:30',
                'deleted_at' => null,
                'email' => 'test5@example.com',
                'email_verified_at' => null,
                'id' => 6,
                'name' => 'test5',
                'password' => '$2y$10$0rtjIZvVx4mAyaXc.Cr4EuSe3bhc8xQ1w55N9QZrIfP9BryJv7a/y',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 11:15:30',
            ],
            6 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 11:17:03',
                'deleted_at' => null,
                'email' => 'test6@example.com',
                'email_verified_at' => null,
                'id' => 7,
                'name' => 'test6',
                'password' => '$2y$10$V1lUV1cjC3oFUwJbPiczweyMXdaU2BPQ8moDaFBRSIvrzqbI0Sst6',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 11:17:03',
            ],
            7 => [
                'card_brand' => null,
                'card_last_four' => null,
                'created_at' => '2020-11-20 11:19:24',
                'deleted_at' => null,
                'email' => 'test7@example.com',
                'email_verified_at' => '2020-11-20 11:20:28',
                'id' => 8,
                'name' => 'test7',
                'password' => '$2y$10$JMILRgkiXTWX9L77F0J0C.r3Kr.9C4NBnrD4QeIuGsyMx41AA7HE6',
                'remember_token' => null,
                'stripe_id' => null,
                'trial_ends_at' => null,
                'updated_at' => '2020-11-20 11:20:28',
            ],
        ]);
    }
}
