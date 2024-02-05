<?php

//1)функция нахождения площади прямоугольника
function findAreaOfRectangle($length1, $length2) {
    return $length1*$length2;
}

echo "1) ". findAreaOfRectangle (17,5). "<br>";

//2)посчитать количество дней в месяце (на выбор)
// echo cal_days_in_month(CAL_GREGORIAN, 2, 2015). "<br>";
echo "2.2) ". date('t'). "<br>";

//3)написать функцию аналогичную echo используя замыкание
$word = function($str){
    echo "3) ";
    var_dump($str);
};

$word('Something word');

//4)посчитать количество дней до нового года
$daysUntilTheNY = function(){
    $days = date_diff(date_create('2025-01-01'),date_create())->days;
    echo "<br> 4) ". $days. "<br>";
};

$daysUntilTheNY();

//5)посчитать разницу между двумя датами
$difference = date_diff(date_create('2024-08-10'),date_create());
$days = $difference->days;
$month = $difference->m;
echo "5) ". $days. " days or ". $month. "<br>";