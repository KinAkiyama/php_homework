<?php

session_start();

class User {
    private string $username;
    private string $password;

    public function setUsername ($string): void{
        $this->username = $string;
    }

    public function setPassword ($string): void{
        $this->password = $string;
    }

    public function getUsername (): string{
        return $this->username;
    }

    public function getPassword (): string{
        return $this->password;
    }

    public function sayHello (): void{
        echo "Hello $this->username!<br>";
    }
}

//1) вынести валидацию различных полей в отдельный класс со статическими переменными и проверять через статические методы данные

class Validator {
    static public string $patternForUsername = '/[A-Za-z-_]{3,}/';
    static public string $patternForPassword = '/[\S]{6,21}/';

    static public function validateUsername($string): bool{
        if (preg_match(self::$patternForUsername,$string)){
            return true;
        } else {return false;}
    }

    static public function validatePassword($string): bool{
        if (preg_match(self::$patternForPassword,$string)){
            return true;
        } else {return false;}
    }
}


if (isset($_POST['username']) && isset($_POST['password'])){
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $user = new User();
        if (Validator::validateUsername($_POST['username']) && Validator::validatePassword($_POST['password'])){
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            
            $data = "Username: ".$user->getUsername(). " Password: ". $user->getPassword();
            $record = file_put_contents('./userdata.txt',$data);

            if ($record == true){
                echo "Success!<br><br>";
            } else {
                echo 'There was an error writing this file<br><br>';
            }
        } else {
            echo "Error!";
        }
    } else {
        echo 'Please check that the data entered is correct<br><br>';
    }
} else {
    echo 'Please fill in all fields of the form<br><br>';
}

$_SESSION['login'] = explode(" ",file_get_contents('./userdata.txt'))[1];
$_SESSION['id'] = 1;
$_SESSION['password'] = explode(" ",file_get_contents('./userdata.txt'))[3];

if ($user->getUsername() == $_SESSION['login']){
    echo $user->sayHello();
} else {
    echo "incorrect login or password!";
}