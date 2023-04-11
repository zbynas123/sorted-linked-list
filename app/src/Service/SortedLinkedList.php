<?php

namespace App\Service;

class SortedLinkedList
{
    private ?Node $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function insertValues(array $values): void
    {
        foreach ($values as $value) {
            $this->insertValue($value);
        }
    }

    public function getList(): ?string
    {
        $current = $this->head;
        $result = '';
        while ($current !== null) {
            $result .= $current->getValue() . " ";
            $current = $current->getNext();
        }

        return $result;
    }

    private function insertValue(string|int $value): void
    {
        $newNode = new Node($value);

        if ($this->head === null || $this->head->getValue() > $value) {
            $newNode->setNext($this->head);
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->getNext() !== null && $current->getNext()->getValue() < $value) {
                $current = $current->getNext();
            }
            $newNode->setNext($current->getNext());
            $current->setNext($newNode);
        }
    }
}
