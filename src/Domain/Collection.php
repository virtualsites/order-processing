<?php
declare(strict_types=1);

namespace Domain;

class Collection implements \Countable, \ArrayAccess, \IteratorAggregate
{
    private $collection;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function offsetExists($offset) : bool
    {
        return array_key_exists($offset, $this->collection);
    }

    public function offsetGet($offset)
    {
        return $this->collection[$offset];
    }

    public function offsetSet($offset, $value) : void
    {
        $this->collection[$offset] = $value;
    }

    public function offsetUnset($offset) : void
    {
        unset($this->collection[$offset]);
    }

    public function count() : int
    {
        return count($this->collection);
    }

    public function getIterator() : \ArrayIterator
    {
        return new \ArrayIterator($this->collection);
    }

    public function add($item)
    {
        $this->collection[] = $item;
    }
}
