<?php

namespace Valdislav\SplFixedArray;

/**
 * Class InsertionSortStrategy
 * Sort SplFixedArray by classic insertion sort algorithm
 */
class InsertionSortStrategy implements  SortStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function sort(\SplFixedArray $array)
    {
        $length = $array->count();
        for($i = 1; $i < $length; $i++) {
            $key = $array[$i];
            $j = $i - 1;
            while ($j >= 0 && $array[$j] > $key) {
                $array[$j+1] = $array[$j];
                $j--;
            }
            $array[$j+1] = $key;
        }
        return $array;
    }
}
