<?php

$str = "Я люблю обучаться php!";

//1)привести все слова к верхнему регистру
echo "1) ". mb_strtoupper($str). "<br>"; //mbm_strtoupper конвертирует строку в верхний регистр
// со специальными символами, кириллица, видимо, тоже спец. символы ¯\_(ツ)_/¯

//2)написать функцию, которая принимает две строки и заменяет одно слово другим
function changeTheString($string, $word){
    return preg_replace('/php/', $word, $string);
}

echo "2) ". changeTheString($str, "всему"). "<br>";

//3)посчитать количество слов в исходной строке
$arrOfStr = explode(' ',$str);

echo "3) ". count($arrOfStr). "<br>";
 
//4)почитать количество всех символов строки
echo "4) ".mb_strlen($str). "<br><br>";



echo "Задание c массивами <br>";

// function output($anonymousFunction) {
//     echo "1) ";
//     print_r($arr);
//     echo "<br>";
// }

$arr = [
    "name" => "Fred",
    "remove" => "True",
    "additional_params" => [
        "is_married" => false,
        "country" => "France",
        "born" => "10.09.1982"
    ]
];

//1)удалить второй эллемент массива
unset($arr['remove']);
echo "1) ";
print_r($arr);
echo "<br>";

//2)найти возраст пользователя
echo "2) ". (date_diff(date_create($arr["additional_params"]["born"]),date_create())->y). "<br>";

//3)отсортировать массив по ключу
ksort($arr);
echo "3) ";
print_r($arr);
echo "<br>";

//4)добавить информацию о стране
$country = [
    "country" =>[
        "countryName" => "France",
        "capital" => "Paris",
        "timeZone" => 1
        ]
];

//информацию о стране можно получить и из функций, но там нужны базы данных или
//нужно будет использовать много функций, потому что ни одна из них не возвращает
//всю нужную информацию

echo "4) ";
print_r(array_replace($arr["additional_params"], $country));
echo "<br>";

//5)объеденить текущий массив с массивом child
$child = ["child" => null];
echo "5) ";
print_r(array_merge($arr,$child));
echo "<br>";

//6)используя дату рождения превратить её в массив
$date = [
    "born" =>[
        "day" => explode('.',$arr["additional_params"]["born"])[0],
        "mounth" => explode('.',$arr["additional_params"]["born"])[1],
        "year" => explode('.',$arr["additional_params"]["born"])[2]
    ]
];

echo "6) ";
print_r(array_replace($arr["additional_params"], $date));
echo "<br>";


echo "<br><br>Доп. задание <br>";

//1) вывести максимальное и минимальное число из даты рождения пользователя
$born = explode('.',$arr["additional_params"]["born"]);
sort($born);
echo "1) <br>";
echo "наименьшее число -> ". $born[0]. "<br>";
echo "наибольшее число -> ". end($born). "<br>";
echo "<br>";

//2)отсортировать числа из даты рождения по возрастанию 
sort($born); //используем массив из предыдущего задания
echo "2) ";
print_r($born);
echo "<br>";

//3)определить знак зодиака пользователя и определить знак по китайскому гороскопу
if (intval($date["born"]["day"]) >= 22 && intval($date["born"]["mounth"]) == 8 || intval($date["born"]["day"]) <= 23 && intval($date["born"]["mounth"]) == 9){
    echo "3) Знак зодиака -> Дева <br>"; //тоже самое для других знаков, задаем рамки дат
}

switch(intval($date["born"]["year"])){
    case 1972:
        echo " Знак зодиака по китайскому гороскопу -> Крыса <br>";
        break;
    case 1973:
        echo " Знак зодиака по китайскому гороскопу -> Бык <br>";
        break;
    case 1974:
        echo " Знак зодиака по китайскому гороскопу -> Тигр <br>";
        break;
    case 1975:
        echo " Знак зодиака по китайскому гороскопу -> Заяц <br>";
        break;
    case 1976:
        echo " Знак зодиака по китайскому гороскопу -> Дракон <br>";
        break;
    case 1977:
        echo " Знак зодиака по китайскому гороскопу -> Змея <br>";
        break;
    case 1978:
        echo " Знак зодиака по китайскому гороскопу -> Лошадь <br>";
        break;
    case 1979:
        echo " Знак зодиака по китайскому гороскопу -> Овца <br>";
        break;
    case 1980:
        echo " Знак зодиака по китайскому гороскопу -> Обезьяна <br>";
        break;
    case 1981:
        echo " Знак зодиака по китайскому гороскопу -> Петух <br>";
        break;
    case 1982:
        echo " Знак зодиака по китайскому гороскопу -> Собака <br>";
        break;
    case 1983:
        echo " Знак зодиака по китайскому гороскопу -> Свинья <br>";
        break;
}

//наверное, можно как-то по другому через какой-то цикл, но я не придумал как