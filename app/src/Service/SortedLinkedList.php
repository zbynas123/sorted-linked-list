<?php

namespace App\Service;

use App\Entity\Node;

class SortedLinkedList
{
    public function __construct(private ?Node $head = null) {}

    public function insertValues(array $values): void
    {
        foreach ($values as $value) {
            $newNode = new Node($value);
            $this->insertValue($newNode, $value);
        }
    }

    public function getList(): ?string
    {
        $current = $this->getHead();
        $result = '';
        while ($current !== null) {
            $result .= $current->getValue() . " ";
            $current = $current->getNext();
        }

        return $result;
    }

    public function getHead(): ?Node
    {
        return $this->head;
    }

    private function insertValue(Node $newNode, string|int $value): void
    {
        if ($this->getHead() === null || $this->getHead()->getValue() > $value) {
            $newNode->setNext($this->getHead());
            $this->head = $newNode;
        } else {
            $current = $this->getHead();
            while ($current->getNext() !== null && $current->getNext()->getValue() < $value) {
                $current = $current->getNext();
            }
            $newNode->setNext($current->getNext());
            $current->setNext($newNode);
        }
    }
}
