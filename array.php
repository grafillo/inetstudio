<?php

$array = [
["id" => 1, "date" => "12.01.2020", "name" => "test1" ],
["id" => 2, "date" => "02.05.2020", "name" => "test2" ],
["id" => 4, "date" => "08.03.2020", "name" => "test4" ],
["id" => 1, "date" => "22.01.2020", "name" => "test1" ],
["id" => 2, "date" => "11.11.2020", "name" => "test4" ],
["id" => 3, "date" => "06.06.2020", "name" => "test3" ],
];

//выделить уникальные записи (убрать дубли) в отдельный массив.
// в конечном массиве не должно быть элементов с одинаковым id.

$arrayUnique = array_filter($array, function($value, $key) {
    static $ids = [];
    if (!in_array($value['id'], $ids)) {
        $ids[] = $value['id'];
        return true;
    }
    return false;
}, ARRAY_FILTER_USE_BOTH);

echo 'выделить уникальные записи (убрать дубли) в отдельный массив.в конечном массиве не должно быть элементов с одинаковым id.
<pre>';
print_r($arrayUnique);
echo '</pre>';


//отсортировать многомерный массив по ключу (любому)
function cmp($a, $b)
{
        $sort = 'id';
        return $a[$sort] < $b[$sort] ? 0 : 1;
}
usort($array, "cmp");

echo 'отсортировать многомерный массив по ключу (любому)<pre>';
print_r($array);
echo '</pre>';

//вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)

function checkId($array)
{
    return $array['id'] === 1;
}

$arrayCheck = array_filter($array,'checkId');

echo 'вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
<pre>';
print_r($arrayCheck);
echo '</pre>';



//изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
$array = array_column($array,'id','name');
echo 'изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)<pre>';
print_r($array);
echo '</pre>';
