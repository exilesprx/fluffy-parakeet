<?php

include_once __DIR__ . "/../src/index.php";

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    /** @test */
    public function it_expects_lazy_collection_to_run_faster()
    {

        $items = [100, 1000, 100000];
        $bag = fillBag($items);

        foreach($bag as $item) {
            $lazyCollection = \Illuminate\Support\LazyCollection::make($item);
            $lazyResults = runOn($lazyCollection);

            $normalCollection = \Illuminate\Support\Collection::make($item);
            $normalResults = runOn($normalCollection);

            $this->assertEquals(
                true,
                $lazyResults < $normalResults,
                sprintf(
                    "Expects lazy collection to be faster. Lazy time: %d -- Normal time: %d",
                    $lazyResults,
                    $normalResults
                )
            );
        }

    }
}
