<?php

include_once __DIR__ . '/vendor/autoload.php';

use Faker\Factory;

function fillBag(array $items): array
{
    $bag = [];
    foreach ($items as $count) {
        $bag[] = createItems($count);
    }
    return $bag;
}

function createItems(int $count): array
{
    $faker = Factory::create();
    $temp = [];
    for ($i = 0; $i < $count; $i++) {
        $temp[] = $faker->realText(20);
    }

    return $temp;
}

function runOn(\Illuminate\Support\Enumerable $enumerable): int
{
    $start = \Carbon\Carbon::now();
    performOperationsOn($enumerable);
    $end = \Carbon\Carbon::now();
    return $start->diffInMicroseconds($end);
}

function performOperationsOn(\Illuminate\Support\Enumerable $collection): void
{
    $collection->each(function($item) {
        return strtoupper($item);
    })
        ->filter(function($item) {
            return str_contains('a', $item);
        })
        ->values();
}