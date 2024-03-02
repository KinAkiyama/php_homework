<?php

$method = ($_SERVER['REQUEST_METHOD'] == 'GET') ? $_GET : $_POST;

setcookie('firstname',$method['firstname'],time()+60);
setcookie('lastname',$method['lastname'],time()+60);

session_start();


$_SESSION['firstname'] =$method['firstname'];
$_SESSION['lastname'] = $method['lastname'];

echo "SESSION<br>";

if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
    if (!empty($_SESSION['firstname']) && !empty($_SESSION['lastname'])){
        echo "Welcome!<br><br>";
    } else {
        echo "Please fill in all fields of the form<br><br>";
    }
}

session_destroy();

echo "COOKIE<br>";

if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname'])){
    if (!empty($_COOKIE['firstname']) && !empty($_COOKIE['lastname'])){
        echo "Welcome!";
    } 
} else {
    echo "Please fill in all fields of the form<br><br>";
}

// я сделал else для первого if в этом случае, потому что если, ввести 0 в поле, то строка проходит первую провеку,
// но не проходит втору. 