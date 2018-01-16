<?php

namespace DS;
use DS\JsonSerializable;
use DS\Collection;
use DS\Vector;

class Pair implements JsonSerializable{
    public $key;
    public $value;

    function __construct($key,$value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    function jsonSerialize()
    {
        $result = array($this->key => $this->value);
        return json_encode($result);
    }

    function clear()
    {
        unset($this->key);
        unset($this->value);
    }

    function isEmpty()
    {
        if(isset($this->key) && isset($this->value))
        {
            return true;
        }
        return false;
    }

    function copy()
    {
        return new Pair($this->key,$this->value);
    }

    function toArray()
    {
        return array($this->key => $this->value);
    }


}

class Map implements Collection{
    private $vector_pair;   //键值对vector

    function __construct()
    {
        $this->vector_pair = new Vector();
    }

    public function clear()
    {
        $this->vector_pair->clear();
    }

    public function isEmpty()
    {
        $this->vector_pair->isEmpty();
    }

    public function toArray()
    {
        $size = $this->vector_pair->count();
        $arr = array();

        for($i = 0;$i<$size;$i++)
        {
            $arr[$this->vector_pair->get($i)->key] = $this->vector_pair->get($i)->value;
        }
        return $arr;
    }

    public function count()
    {
        return $this->vector_pair->count();
    }

    public function jsonSerialize()
    {
        $arr = $this->toArray();
        return json_encode($arr);
    }

    public function apply($callback)
    {
        call_user_func_array($callback,array_values($this->toArray()));
    }

    public function capacity()
    {
        return sizeof($this->vector_pair);
    }

    public function put($key,$value)
    {
        $pair = new Pair($key,$value);
        $this->vector_pair->push($pair);
    }

    public function copy()
    {
        $map = new Map();
        for($i = 0; $i < $this->count();$i++)
        {
            $map->put($this->vector_pair->get($i)->key,$this->vector_pair->get($i)->value);
        }
        return map;

    }

    public function filter($callback)
    {
        $map = new Map();
        for($i = 0;$i<$this->count();$i++)
        {
            if(call_user_func($callback,$this->vector_pair->get($i)->key,$this->vector_pair->get($i)->value))
            {
                $map->put($this->vector_pair->get($i)->key,$this->vector_pair->get($i)->value);
            }
        }
        return $map;
    }

    public function first()
    {
        if($this->isEmpty())
        {
            return null;
        }
        return $this->vector_pair->get(0);
    }

    public function get($key)
    {
        $arr = $this->toArray();
        return $arr[$key];
    }

    public function hasKey($key)
    {
        $arr = $this->toArray();
        return array_key_exists($key,$arr);
    }

    public function hasValue($value)
    {
        $arr = $this->toArray();
        $arr = array_values();
        foreach($arr as $_value)
        {
            if($value == $_value)
            {
                return true;
            }
        }
        return false;
    }

    public function keys()
    {
        return new Set(array_keys($this->toArray()));
    }

    public function ksort($callback)
    {
        $keys = array_keys($this->toArray());
        sort($keys,$callback);
        $map = $this->copy();
        $this->clear();
        foreach($keys as $key)
        {
            $this->put($key,$map->get($key));
        }
    }

    public function ksorted($callback)
    {
        $map = $this->copy();
        $map->ksort($callback);
        return $map;
    }

    public function last()
    {
        return $this->vector_pair[$this->count() - 1];
    }

    public function map($callback)
    {
        $this->vector_pair->map($callback);
    }

    public function merge($values)
    {
        if(is_array($values))
        {
            $this->vector_pair->merge($values);
        }
    }

    public function pairs()
    {
        return $this->vector_pair;
    }

    public static function toMap($arr)
    {
        if(is_array($arr))
        {
            $keys = array_keys($arr);
            $map = new Map();
            for($i = 0; $i < count($arr); $i++)
            {
                $map->put($keys[$i],$arr[$keys[$i]]);
            }
            return $map;
        }
        return null;
    }

    public function putAll($pairs)
    {
        $this->vector_pair->push($pairs);
    }

    public function reduce()
    {
        $this->vector_pair->reduce();
    }

    public function remove($key)
    {
        if($this->hasKey($key))
        {
            $value = $this->get($key);
            for($i = 0;$i<$this->count();$i++)
            {
                if($this->vector_pair[i]->key == $key)
                {
                    $this->vector_pair->remove($i);
                    return $value;
                }
            }
        }
        return null;
    }

    public function reverse()
    {
        $this->vector_pair->reverse();
    }

    public function reversed()
    {
        $map = $this->copy();
        return $map->reverse();
    }

    public function skip($position)
    {
        return $this->vector_pair[$position];
    }

    public function slice($index,$length)
    {
        $this->vector_pair->slice($index,$length);
    }

    public function sort($comparator)
    {
        $this->vector_pair->sort($comparator);
    }

    public function sorted($comparator)
    {
        $map = $this->copy();
        return $map->vector_pair->sort($comparator);
    }

    public function values()
    {
        return array_values($this->toArray());
    }

    public function sum()
    {
        $values = $this->values();
        return array_sum($values);
    }
}
?>