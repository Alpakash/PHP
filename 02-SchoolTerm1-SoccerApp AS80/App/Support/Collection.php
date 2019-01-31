<?php

namespace App\Support;

class Collection{

    protected $storage;

    public function __construct(array $array)
    {
    	$this->storage = $array;
    }

	public function add($key, $value)
    {
        $this->storage[$key] = $value;
    }

    public function remove($key)
    {
        if(array_key_exists($key, $this->storage)) {
            unset($this->storage[$key]);
        }
    }

    public function get($key)
    {
        return array_key_exists($key, $this->storage) ? $this->storage[$key] : null;
    }

    public function getArrayKeys()
    {
        return array_keys($this->storage);
    }

    public function getArrayValues()
    {
        return array_values($this->storage);
    }

    public function exists($key)
    {
        return array_key_exists($key, $this->storage);
    }

    public function getAll()
    {
        return $this->storage;
    }

    public function count()
    {
        return count($this->storage);
    }

    public function clear()
    {
        unset($this->storage);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->storage);
    }
}