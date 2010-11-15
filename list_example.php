<?php

$list = new \Predis\RedisList("key");

$list[] = "foo";
$list[] = "bar";
$list[] = "lorem";
$list[] = "ipsum";

// array(foo, bar, lorem, ipsum)

$list["<<"] = "php5"; // array(php5, foo, bar, lorem, ipsum)

count($list); // 5

foreach($list as $data) {
  echo $data;
}

$list->each(2, function($value) {
  echo $value;
});

// php5, foo

$list->pop(); // ipsum
$list->shift(); // php5


// once you cast the list as an array, you can use all of the normal php array
// functions, but data in the array will no longer be pushed/pulled from redis
$data = (array)$list;
array_values($data);

