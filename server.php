<?php

session_start();

echo "1) <br>";

if (isset($_POST['username']) && isset($_POST['password'])){
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $data = "Username: ". $_POST['username']. " Password: ". $_POST['password'];
        $record = file_put_contents('./userdata.txt',$data,);
        if ($record == true){
            echo "Success!<br><br>";
        } else {
            echo 'There was an error writing this file<br><br>';
        }
    } else {
        echo 'Please check that the data entered is correct<br><br>';
    }
} else {
    echo 'Please fill in all fields of the form<br><br>';
}


//2) написать функцию, которая проверяет совпадения введеных данных с данными в файле
echo "2) <br>";

$arr = array_map(function (){
    return rand(0,10);
}, array_fill(0,10,null));

$arrayData = implode(' ', $arr);

file_put_contents('./secondTask.txt', $arrayData);
$fileContent = explode(" ",file_get_contents('./secondTask.txt'));
echo file_get_contents('./secondTask.txt')."<br>";

if (isset($_POST['number'])){
    if(!empty($_POST['number'])){
        $count = 0;
        foreach($fileContent as $key=>$val){
            if ($val == $_POST['number']){
                $count++;
            }
        }
        echo $count."<br><br>";
    } else {
        echo 'Please check that the data entered is correct<br><br>';
    }
} else {
    echo 'Please fill in all fields of the form<br><br>';
}

//3) получить структуру каталога, посчитать файлы, папки и тд
echo "3) <br>";

$dirs = scandir(getcwd());
$files = -2; // я отнял 2, т.к первыми в дериктории идут . и .., что не является ни файлом и папкой
$folders = 0;

foreach($dirs as $dir=>$val){
    echo $val. "<br>";
    if(preg_match("/\./", $val) == false){
        $folders++;
    } else {
        $files++;
    }
}
echo "Каталог содержит {$files} файлов и {$folders} папок<br><br>";

// 4) написать функцию транслит 
echo "4) <br>";

if (isset($_POST['string'])){
    if(!empty($_POST['string'])){
        translateToTranslit($_POST['string']);
    } else {
        echo 'Please check that the data entered is correct<br><br>';
    }
} else {
    echo 'Please fill in all fields of the form<br><br>';
}

function translateToTranslit ($string) {
    $translit = [
        'а'=>'a',
        'б'=>'b',
        'в'=>'v',
        'г'=>'g',
        'д'=>'d',
        'е'=>'e',
        'ё'=>'e',
        'ж'=>'zh',
        'з'=>'z',
        'и'=>'i',
        'й'=>'i',
        'к'=>'k',
        'л'=>'l',
        'м'=>'m',
        'н'=>'n',
        'о'=>'o',
        'п'=>'p',
        'р'=>'r',
        'с'=>'c',
        'т'=>'t',
        'у'=>'yu',
        'ф'=>'f',
        'ч'=>'ch',
        'ц'=>'c',
        'ш'=>'sh',
        'щ'=>'sh',
        'ы'=>'i',
        'э'=>'e',
        'ю'=>'y',
        'я'=>'ya',
    ];

    $string = strtr($string,$translit);
    return $string;
}

echo translateToTranslit($_POST['string']). "<br><br>";

//5) используя первое задание написать авторизацию через сессию
echo "5) <br>";

$_SESSION['login'] = explode(" ",file_get_contents('./userdata.txt'))[1];
$_SESSION['id'] = 1;
$_SESSION['password'] = explode(" ",file_get_contents('./userdata.txt'))[3];

if ($_POST['username'] == $_SESSION['login']){
    echo "Hello {$_SESSION['login']}! <br><br>";
}

//6) загрузить картинку и проверить её расширение 
echo "6) <br>";

if (isset($_POST['file']) && !empty($_POST['file'])){
    if (preg_match('/.jpg$/',$_POST['file'])){
        echo "File added";
    } else {
        echo "File is not a picture";
    }
} else {
    echo 'Please choose the file<br><br>';
}