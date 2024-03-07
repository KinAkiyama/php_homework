<?php

$method = ($_SERVER['REQUEST_METHOD'] == 'GET') ? $_GET : $_POST;

//2)

$user = [
    'firstName' => $method['firstName'],
    'lastName' => $method['lastName'],
    'phoneNumber' => $method['phoneNumber'],
    'address' => $method['address'],
    'birthday' => $method['birthday'],
    'email' => $method['email'],
];

if (preg_match("/\S{2,}/" ,$user['firstName'])){
    echo "Success!<br>";
} else {
    echo "Invalid Name<br>";
}

if (preg_match("/\S{2,}/",$user['lastName'])){
    echo "Success!<br>";
} else {
    echo "Invalid Surame<br>";
}

if (preg_match("/[+]375-\d{2}-\d{3}-\d{2}-\d{2}/",$user['phoneNumber'])){
    echo "Success!<br>";
} else {
    echo "Invalid Phonenumber<br>";
}

if (preg_match("/[A-Za-z]{3,}\s[A-Za-z-\s?A-Za-z]{3,}\s[A-Za-z-\s?A-Za-z]{3,}/",$user['address'])){
    echo "Success!<br>";
} else {
    echo "Invalid Adderss<br>";
}

if (preg_match("/[0-3][0-9]-[0-1][1-9]-[1-2]9[4-9][0-9]/",$user['birthday'])){
    echo "Success!<br>";
} else {
    echo "Invalid birthday date<br>";
}

//У меня при введении несуществующего имейла не работала отправка формы, поэтому, наверное,
//можно считать, что валидация имейла на клиенте лучше чем через любое regex


//3)вывести возраст согласно дате указанной в анкете
$age = date_diff(date_create($user['birthday']),date_create())->y;

echo "<br>Возраст пользователя -> ". $age. "<br><br>";

//4)преобразовать строку адреса в массив
$explodedAddress = function ($address){
    $address = [
        'address' => [
            'country' => explode(' ',$address)[0],
            'city' => explode(' ',$address)[1],
            'street' => explode(' ',$address)[2],
        ]
    ];
    return $address;
};
$user = array_replace($user, $explodedAddress($user['address']));
print_r($user);