<?php

namespace Valdislav\SplFixedArray\Tests;

use Valdislav\SplFixedArray\InsertionSortStrategy;
use Valdislav\SplFixedArray\SelectionSortStrategy;

/**
 * Tests sorting SplFixedArray
 */
class SortStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider valuesDataProvider
     * @param \SplFixedArray $arr
     * @param array $expected
     */
    public function testSelectionSort(\SplFixedArray $arr, array $expected)
    {
        $selectionStrategy = new SelectionSortStrategy();
        $this->assertNotEquals($expected,$arr->toArray());
        $this->assertEquals($expected, $selectionStrategy->sort($arr)->toArray());
    }

    /**
     * @dataProvider valuesDataProvider
     * @param \SplFixedArray $arr
     * @param array $expected
     */
    public function testInsertionSort(\SplFixedArray $arr, array $expected)
    {
        $selectionStrategy = new InsertionSortStrategy();
        $this->assertNotEquals($expected, $arr->toArray());
        $this->assertEquals($expected, $selectionStrategy->sort($arr)->toArray());
    }

    public function valuesDataProvider()
    {
        $splFixedArrayIn = \SplFixedArray::fromArray([2,154,2342,1001,7651,4523,1343,756,6324,1]);
        $expected = [ 1,2,154,756,1001,1343,2342,4523,6324,7651 ];

        $splFixedArrayIn2 = clone $splFixedArrayIn;
        $splFixedArrayIn2[9] = 8000;
        $expected2 = [ 2,154,756,1001,1343,2342,4523,6324,7651,8000 ];
        return [
            [ $splFixedArrayIn, $expected ],
            [ $splFixedArrayIn2, $expected2 ]
        ];
    }
}
