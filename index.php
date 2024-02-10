<?php

$str = "Я люблю PHP";

//1)удалить все пробелы из строки
echo "1) ". preg_replace('/\s/', '',$str). "<br>";

//2)заменить PHP на другую строку
echo "2) ". preg_replace('/PHP/', 'баскетбол',$str). "<br>";

//3)найти содержит ли строка подстроку PHP
if (preg_match('/PHP/', $str) == 1){
    echo  "3) Строка содержит подстроку PHP <br>";
} else {
    echo  "3) Строка не содержит подстроку PHP <br>";
}

//4)удалить второе слово из строки
echo "4.1) ". preg_replace('/люблю/', '',$str). "<br>";
echo "4.2) ". deleteSecondElement($str). "<br>";

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
echo checkPhoneNumber($anotherPhoneNumber). "<br>";

function checkPhoneNumber ($phoneNumber){
    if (preg_match("/375-[\d{2}]-[\d{3}]-[\d{2}]-[\d{2}]/", $phoneNumber)){
        echo  "Номер телефона указан верно! <br>";
    } else {
        echo  "Номер телефона указан неверно! <br>";
    }
}