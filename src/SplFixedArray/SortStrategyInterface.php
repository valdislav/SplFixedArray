<?php

namespace Valdislav\SplFixedArray;

/**
 * Interface SortStrategyInterface
 */
interface SortStrategyInterface
{
    /**
     * Sort an SplFixedArray
     *
     * @param \SplFixedArray $array
     * @return \SplFixedArray
     */
    public function sort(\SplFixedArray $array);
}
