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
=======
$str = "Я люблю PHP";

//1)удалить все пробелы из строки
echo "1) ". preg_replace('/\s/', '',$str). "<br><br>";

//2)заменить PHP на другую строку
echo "2) ". preg_replace('/PHP/', 'баскетбол',$str). "<br><br>";

//3)найти содержит ли строка подстроку PHP
if (preg_match('/PHP/', $str) == 1){
    echo  "3) Строка содержит подстроку PHP <br><br>";
} else {
    echo  "3) Строка не содержит подстроку PHP <br><br>";
}

//4)удалить второе слово из строки
echo "4.1) ". preg_replace('/люблю/', '',$str). "<br>";
echo "4.2) ". deleteSecondElement($str). "<br><br>";

function deleteSecondElement($string){
    $arr = explode(" ",$string);
    unset($arr[1]);

    return implode(" ",$arr);
}

//5)написать регулярку для проверки номера телефона РБ
$phoneNumber = "+375-29-123-45-67";
$anotherPhoneNumber = "+015-29-123-45-67";
echo "5) ". $phoneNumber. "<br>";
echo $anotherPhoneNumber. "<br>";

echo checkPhoneNumber($phoneNumber). "<br>";
echo checkPhoneNumber($anotherPhoneNumber). "<br><br>";

function checkPhoneNumber ($phoneNumber){
    if (preg_match("/[+]375-\d{2}-\d{3}-\d{2}-\d{2}/", $phoneNumber)){
        echo  "Номер телефона указан верно!";
    } else {
        echo  "Номер телефона указан неверно!";
    }
}

//6)написать регулярку для проверки URL
$url = "/catalog/125/item12/tovar-name";

echo "6) ". $url. "<br>";
echo checkURL($url). "<br><br>";

function checkURL ($url){
    if(preg_match("/\/catalog\/[-_№]?\d*\/item[-_№]?\d*\/\S/", $url)){
        echo  "URL указан верно!";
    } else {
        echo  "URL указан неверно!";
    }
}

//я использовал \S хотя он соответствует любому символу, кроме пробела и переводу
//строки, но, думаю, что здесь это будет уместно, т.к там должно быть название товара
