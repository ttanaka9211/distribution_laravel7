<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\COmment;
use Faker\Generator as Faker;

$factory->define(COmment::class, function (Faker $faker) {
    return [
        'body' => "コメントです。テキストテキストテキストテキストテキストテキスト。\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
    ];
});
