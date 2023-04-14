<?php
namespace Service;

use App\Entity\Node;
use App\Service\SortedLinkedList;
use PHPUnit\Framework\TestCase;

final class SortedLinkedListTest extends TestCase
{
    public function testInsertValues(): void
    {
        $list = $this->getSortedLinkedList();

        // Insert multiple values
        $list->insertValues([10, 5, 15, 20]);
        $this->assertEquals('5 10 15 20 ', $list->getList());

        // Insert duplicate value
        $list->insertValues([15]);
        $this->assertEquals('5 10 15 15 20 ', $list->getList());

        // Insert values in descending order
        $list->insertValues([20, 15, 10, 5]);
        $this->assertEquals('5 5 10 10 15 15 15 20 20 ', $list->getList());

        // Insert empty array
        $emptyList = $this->getSortedLinkedList();
        $this->getSortedLinkedList()->insertValues([]);
        $this->assertEquals('', $emptyList->getList());
    }

    public function testGetHead(): void
    {
        $list = $this->getSortedLinkedList();

        // Head node should be null for empty list
        $this->assertNull($list->getHead());

        // Insert single value
        $node = new Node(10);
        $list->insertValues([10]);
        $this->assertEquals($node, $list->getHead());
    }

    private function getSortedLinkedList(): SortedLinkedList
    {
        return new SortedLinkedList();
    }
}