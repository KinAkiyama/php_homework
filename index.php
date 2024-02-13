<?php

//1)сумма всех элементов массива

$arr = array_map(function () { //генерация массива
    return rand(0,100);
},array_fill(0,10,null));

print_r($arr);
echo "<br>";

function sumOfArray($array):int{
    $sum = 0;
    for ($i=0;$i<sizeof($array);$i++){
        $sum += $array[$i];
    }
    return $sum;
}

echo "1.1) Результат кастомной функции => ". sumOfArray($arr). "<br>";
echo "1.2) Результат встроенной функции => ". array_sum($arr). "<br><br>";

//2)написать функцию, которая принимает на вход первым аргументом массив, а вторым что-то строковое
$arrayForCheck = [15,60,42,87,11,50,64,59,27,1];
$stringNumber = '50';
print_r($arrayForCheck);
echo "<br>Искомое число -> {$stringNumber} <br>";
function checkOfArray($array,$stringNumber){
    $coincidence = false;
    foreach($array as $value){
        if ($value == intval($stringNumber)){
            $coincidence = true;
        }
    }
    if ($coincidence == true) {
        echo "2) Массив содержит это число! <br>";
    } else {
        echo "2) Массив не содержит это число! <br>";
    }
}

echo checkOfArray($arrayForCheck,$stringNumber). "<br><br>";

//3)написать функцию, которая на вход принимает массив, а возвращает элементы массива отсортированные по возрастанию
function sortArray ($array){ //сортировка пузырьком
    for ($i=0;$i<sizeof($array)-1;$i++){
        for ($j=0;$j<sizeof($array)-$i-1;$j++){
            if ($array[$j]>$array[$j+1]){
                $temp = $array[$j+1];
                $array[$j+1] = $array[$j];
                $array[$j] = $temp; 
            }   
        }
    }
    return $array;
}

echo "3.1)Соритровка пузырьком <br>";
print_r(sortArray($arr));
echo "<br>3.2)Встроенная функция сортировки <br>";
sort($arr);
print_r($arr);

