<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Item;
use Faker\Generator as Faker;
use function GuzzleHttp\json_encode;

$factory->define(
    Item::class,
    function (Faker $faker) {

        $field = [];
        $max = rand(2, 5);
        for ($i = 0; $i < $max; $i++) {
            $field[] = [
                "id" => $i + 1,
                "key" => $faker->word,
                "value" => $faker->word
            ];
        }
        // $properties =  json_encode($field);
        // dd($properties);
        return [
            'name' => $faker->word,
            'category_id' => rand(1, 10),
            'properties' =>  json_encode($field)
        ];
    }
);
