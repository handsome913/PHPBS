<?php

namespace DS;
use \DS\Traversable;
use \DS\Countable;
use \DS\JsonSerializable;

interface Collection extends Traversable,Countable,JsonSerializable{
    public function clear();
    public function copy();
    public function isEmpty();
    public function toArray();
}
?>