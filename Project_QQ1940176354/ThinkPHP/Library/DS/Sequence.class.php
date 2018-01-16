<?php

namespace DS;
use DS\Collection;

interface Sequence extends Collection{
    public function allocate($capacity);
    public function apply($callback);
    public function capacity();
    public function contains($values);
    public function filter($callback);
    public function find($value);
    public function first();
    public function get($index);
    public function insert($index,$values);
    public function join($glue);
    public function last();
    public function map($callback);
    public function merge($values);
    public function pop();
    public function push($values);
    public function reduce($callback,$initial);
    public function remove($index);
    public function reverse();
    public function rotate($rotations);
    public function set($index,$value);
    public function shift();
    public function slice($index,$length);
    public function sort($comparator);
    public function sum();
    public function unshift($values);
}

?>