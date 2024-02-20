<?php

//1)удалить из массива все подстроки длина которых больше 3-х
$initialArr = [1,22,333,4444,22,5555,1];

$changedArr = preg_replace('/\S{4,}/',"",$initialArr);

function checkEmptyElement ($array){
    for ($i=0;$i<sizeof($array)+1;$i++){
        if ($array[$i] == ""){
            unset($array[$i]);
        }
    }
    return $array;
}

echo "1.1) Решение через regex<br>";
print_r(checkEmptyElement($changedArr));

function replaceLargeElement($initialArr){
    foreach ($initialArr as $key=>$value){
        if (strlen((string)$value)>3){
            unset($initialArr[$key]);
        }
    }   
    return $initialArr;
}

echo "<br>1.2) Решение через foreach <br>";
print_r(replaceLargeElement($initialArr));

//P.s я посмотрел время выполнения обеих функций и вторая более быстрая, поэтому более предпочтительная

//2)преобразовать данную дату в массив типа год, месяц, день
$initialData = "2025-12-31";

$date = [
    "year" => explode('-',$initialData)[0],
    "month" => explode('-',$initialData)[1],
    "day" => explode('-',$initialData)[2]
];

echo "<br><br>2) Решение через explode <br>";
var_dump($date);

//Я не придумал как это можно сделать через цикл

//3)функция для соритровки слов в строке в алфавитном порядке
$initialString = "abc cd bsd";
echo "<br><br>3) Начальная строка -> {$initialString}<br>";
$initialString = explode(' ',$initialString);

sort($initialString);
echo "Отсортированная строка -> ". implode(' ',$initialString). "<br><br>";

//4)написать функцию, которая принимает массив и элемент, а возвращает слдующий элемент
$arr = [1,3,2,5,4];
echo "4)";
print_r($arr);
echo "<br>";

function returnNextElement ($array,$element){
    if (checkExistence($array,$element)){
        foreach ($array as $key=>$val){
            if ($element == $val){
                if ($key == sizeof($array)-1){
                    echo "Элемент следующий за {$val} -> ". $array[0]. "<br>";
                } else {
                    echo "Элемент следующий за {$val} -> ". $array[$key+1]. "<br>";
                }
            }
        }
    } else {
        echo "Элемента не существует!";
    }
}

function checkExistence ($array, $element){
    $existance = false;

    foreach ($array as $key => $el){
        if ($el == $element){
            $existance = true;
        }
    }
    return $existance;
}

// У меея пролучилось так, что в двух функциях очень похожий код и в обеих функциях идет
// перебор всего массива, что нехорошо с точки зрения произодительности, поэтому я был
// бы очень рад узнать, что можно оптимизировать

returnNextElement($arr, 3);
returnNextElement($arr, 4);