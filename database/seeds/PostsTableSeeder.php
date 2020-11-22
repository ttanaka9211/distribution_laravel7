<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        DB::table('posts')->insert([
            0 => [
                'body' => 'test',
                'created_at' => '2020-11-19 18:31:31',
                'id' => 1,
                'image' => 'https://laravel-s3-001.s3.ap-northeast-1.amazonaws.com/13MQyhgUaW2BJwSwaJ9i5Zcx4x9Gb8BuG4vn8vjl.png',
                'path' => 'https://laravel-s3-001.s3.ap-northeast-1.amazonaws.com/dz59D0m7hLawpRU3HVFjS08JGsy3zTmnLeSnquim.mp4',
                'title' => 'test1test1',
                'updated_at' => '2020-11-19 18:31:31',
            ],
        ]);
    }
}
