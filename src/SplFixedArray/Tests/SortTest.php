<?php

namespace Valdislav\SplFixedArray\Tests;

use Valdislav\SplFixedArray\Sort;

/**
 * Test use algorithm strategies
 */
class SortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $sortStrategyInterfaceMock;

    /**
     * @var Sort
     */
    protected $sortObject;

    protected function setUp()
    {
        $this->sortStrategyInterfaceMock = $this->getMockBuilder('\Valdislav\SplFixedArray\SortStrategyInterface')
            ->getMockForAbstractClass();
        $this->sortObject = new Sort($this->sortStrategyInterfaceMock);
    }

    public function testSortStrategy()
    {
        $fixedArray = new \SplFixedArray();
        $this->sortStrategyInterfaceMock->expects($this->once())->method('sort')->will($this->returnArgument(0));
        $this->assertSame($fixedArray, $this->sortObject->sort($fixedArray));
    }

    public function testChangeSortStrategy()
    {
        $fixedArray = new \SplFixedArray();
        $sortStrategy = $this->getMockBuilder('\Valdislav\SplFixedArray\InsertionSortStrategy')
            ->getMock();
        $this->sortObject->setSortStrategy($sortStrategy);
        $sortStrategy->expects($this->once())->method('sort')->will($this->returnArgument(0));
        $this->sortStrategyInterfaceMock->expects($this->never())->method('sort');
        $this->assertSame($fixedArray, $this->sortObject->sort($fixedArray));
    }
}
