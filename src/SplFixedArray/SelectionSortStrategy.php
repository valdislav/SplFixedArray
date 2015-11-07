<?php

namespace Valdislav\SplFixedArray;

/**
 * Class SelectionSortStrategy
 * Sort SplFixedArray by classic selection sort algorithm
 */
class SelectionSortStrategy implements SortStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function sort(\SplFixedArray $array)
    {
        $length = $array->count();
        for($i = 0; $i < $length - 1; $i++) {
            $smallest = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($array[$j] < $array[$smallest]) {
                    $smallest = $j;
                }
            }
            $tmp = $array[$i];
            $array[$i] = $array[$smallest];
            $array[$smallest] = $tmp;
        }
        return $array;
    }
}
