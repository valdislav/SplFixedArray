<?php

namespace Valdislav\SplFixedArray;

/**
 * Class Sort - bike edition
 * Use some sort algorithms for sorting SplFixedArray
 */
class Sort
{
    /**
     * @var SortStrategyInterface
     */
    protected $sortStrategy;

    /**
     * Default strategy initialization
     *
     * @param SortStrategyInterface $sortStrategy
     */
    public function __construct(SortStrategyInterface $sortStrategy)
    {
        $this->setSortStrategy($sortStrategy);
    }

    /**
     * Change algorithm on the fly
     *
     * @param SortStrategyInterface $sortStrategy
     */
    public function setSortStrategy(SortStrategyInterface $sortStrategy)
    {
        $this->sortStrategy = $sortStrategy;
    }

    /**
     * Invoker
     *
     * @param \SplFixedArray $array
     * @return \SplFixedArray
     */
    public function sort(\SplFixedArray $array)
    {
        return $this->sortStrategy->sort($array);
    }
}
