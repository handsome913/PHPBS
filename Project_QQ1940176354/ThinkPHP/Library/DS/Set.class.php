<?php

namespace DS;
use DS\Collection;
use DS\Vector;

class Set implements Collection
{
    private $vector;
    function __construct($values)
    {
        $this->vector = new Vector($values);
        $this->check();
    }

    public function add($values)
    {
        if(!is_null($this->vector->find($values)))
        {
            return ;
        }
        $this->vector->push($values);
    }

    public function capacity()
    {
        return $this->vector->capacity();
    }

    public function clear()
    {
        $this->vector->clear();
    }

    public function copy()
    {
        $vector = $this->vector->copy();
        $set = new Set($vector->values());
        return $set;
    }

    public function count()
    {
       return $this->vector->count();
    }

    public function filter($callback)
    {
        $vector = $this->vector->filter($callback);
        return new Set($vector->toArray());
    }

    public function first()
    {
        return $this->vector->first();
    }

    public function get($index)
    {
        return $this->vector->get($index);
    }

    public function join($glue)
    {
        return $this->vector->join($glue);
    }

    function jsonSerialize()
    {
        return $this->vector->jsonSerialize();
    }

    public function last()
    {
        return $this->vector->last();
    }

    public function merge($values)
    {
        $this->vector->merge($values);
        $this->check();
    }

    public function reduce($callback,$initial)
    {
        $this->vector->reduce($callback,$initial);
    }

    public function remove($index)
    {
        $this->vector->remove($index);
    }

    public function reverse()
    {
        $this->vector->reverse();
    }

    public function reversed()
    {
        $set = $this->copy();
        return $set->reverse();
    }

    public function slice($index,$length)
    {
        return $this->vector->slice($index,$length);
    }

    public function sort($comparator)
    {
        $this->vector->sort($comparator);
    }

    public function sorted($comparator)
    {
        $set = $this->copy();
        return $set->sort();
    }

    public function sum()
    {
        return $this->vector->sum();
    }

    public function isEmpty()
    {
        return $this->vector->isEmpty();
    }

    public function toArray()
    {
        return $this->vector->toArray();
    }

    private function check()
    {
        for($i = 0;$i<$this->count();$i++)
        {
            for($j=$i+1;$j<$this->count();$j++)
            {
                if($this->vector->get($i) == $this->vector->get($j))
                {
                    $this->remove($i);
                }
            }
        }
    }


}

?>