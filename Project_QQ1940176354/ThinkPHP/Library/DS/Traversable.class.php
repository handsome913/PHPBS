<?php

/*
 * 检测一个类是否可以使用foreach进行接口遍历
 * 无法被单独实现的基本抽象接口。相反它必须由 IteratorAggregate 或 Iterator 接口实现。
 */
namespace DS;
interface Traversable{

}

?>