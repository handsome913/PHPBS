<?php

namespace DS;
use DS\Sequence;

class Vector implements Sequence
{
    private $values;

    public function __construct($values = null)
    {
        if(is_array($values))
        {
            $this->values = $values;
        }
        else
        {
            $this->values = array();
            if($values != null)
            {
                $this->values[0] = $values;
            }
        }

    }


    public function clear()
    {
        while(count($this->values) != 0)
        {
            $this->pop($this->values);
        }
    }

    public function copy()
    {
        $arr = array_values($this->values);
        return arr;
    }

    public function isEmpty()
    {
        if($this->count() == 0)
        {
            return true;
        }
        return false;
    }

    public function toArray()
    {
        return $this->values;
    }

    public function count()
    {
        return count($this->values);
    }

    public function allocate($capacity)
    {

    }

    public function apply($callback)
    {
        call_user_func_array($callback,$this->values);
    }

    public function capacity()
    {
        return sizeof($this->values);
    }

    public function contains($values)
    {
        if(is_array($values))
        {
            foreach($values as $value0)
            {
                foreach($this->values as $value1)
                {
                    if($value0 != $value1)
                    {
                        if($value1 == $this->last())
                        {
                            return false;
                        }
                        continue;
                    }
                    else
                    {
                        break;
                    }
                }
            }
            return true;
        }
        else
        {
            $values = array($values);
            return $this->contains($values);
        }
    }

    public function filter($callback)
    {
        $arr = array_filter($this->values,$callback);
        return new Vector($arr);
    }

    public function find($value)
    {
        for($i = 0;$i<$this->count();$i++)
        {
            if($this->get($i) == $value)
            {
                return $i;
            }
        }
        return null;
    }

    public function first()
    {
        if($this->isEmpty())
        {
            return null;
        }
        return $this->values[0];
    }

    public function get($index)
    {
        if($index >=0 && $index < $this->count())
        {
            return $this->values[$index];
        }
        return null;
    }

    public function insert($index, $values)
    {
        array_splice($this->values,$index,0,$values);
    }

    public function join($glue)
    {
        return join($glue,$this->values);
    }

    public function last()
    {
        if($this->isEmpty())
        {
            return null;
        }
        return $this->values[$this->count()-1];
    }

    public function map($callback)
    {
        array_map($this->values,$callback);
    }

    public function merge($values)
    {
        array_merge($this->values,$values);
    }

    public function pop()
    {
        array_pop($this->values);
    }

    public function push($values)
    {
        array_push($this->values,$values);
    }

    public function reduce($callback, $initial)
    {
        array_reduce($this->values,$callback,$initial);
    }

    public function remove($index)
    {
        unset($this->values[$index]);
    }

    public function reverse()
    {
        array_reverse($this->values);
    }

    public function rotate($rotations)
    {
        for($i=0;$i<$rotations;$i++)
        {
            $this->push($this->first());
            $this->pop();
        }
    }

    public function set($index, $value)
    {
        $this->values[$index] = $value;
    }

    public function shift()
    {
        array_shift($this->values);
    }

    public function slice($index, $length)
    {
        array_slice($this->values,$index,$length);
    }

    public function sort($comparator)
    {
        sort($this->values,$comparator);
    }

    public function sum()
    {
        return $this->sum($this->values);
    }

    public function unshift($values)
    {
        array_unshift($this->values,$values);
    }

    function jsonSerialize()
    {
        return json_encode($this->values);
    }

}

?>