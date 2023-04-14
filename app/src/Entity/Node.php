<?php

namespace App\Entity;

class Node
{
    private string|int $value;
    private Node|null $next;

    public function __construct(string|int $value)
    {
        $this->next = null;
        $this->value = $value;
    }

    public function getValue(): int|string
    {
        return $this->value;
    }

    public function setValue(int|string $value): void
    {
        $this->value = $value;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }
}
