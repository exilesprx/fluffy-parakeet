<?php

include_once 'vendor/autoload.php';

use Faker\Factory;

$items = [100, 1000, 100000];
$bag = fillBag($items);

foreach($bag as $item) {
    $collection = \Illuminate\Support\LazyCollection::make($item);
    runOn($collection);

    $collection = \Illuminate\Support\Collection::make($bag);
    runOn($collection);
}

function fillBag(array $items): array
{
    $bag = [];
    foreach ($items as $item) {
        $bag[] = createItems($item);
    }
    return $bag;
}

function createItems(int $count): array
{
    $faker = Factory::create();
    $temp = [];
    for ($i = 0; $i < $count; $i++) {
        $temp [] = $faker->realText(20);
    }

    return $temp;
}

function runOn(\Illuminate\Support\Enumerable $enumerable): void
{
    $start = \Carbon\Carbon::now();
    performOperationsOn($enumerable);
    $end = \Carbon\Carbon::now();
    echo sprintf("Stats for %d items \n", $enumerable->count());
    echo sprintf("Time elapsed for normal collection %d \n", $start->diffInMicroseconds($end));
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