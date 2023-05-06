<?php

include_once 'vendor/autoload.php';

use Faker\Factory;
$faker = Factory::create();

$items = [100, 1000, 100000];
foreach ($items as $item) {
    $temp = [];
    for ($i = 0; $i < $item; $i++) {
        $temp [] = $faker->realText(20);
    }

//    $collection = \Illuminate\Support\LazyCollection::make($temp);
    $collection = \Illuminate\Support\Collection::make($temp);

    $start = Carbon\Carbon::now();
    $collection->each(function($item) {
        return strtoupper($item);
    })
        ->filter(function($item) {
            return str_contains('a', $item);
        })
        ->values();
    $end = \Carbon\Carbon::now();

    echo sprintf("Stats for %d items \n", $item);
    echo sprintf("Time elapsed for normal collection %d \n", $start->diffInMicroseconds($end));
}
