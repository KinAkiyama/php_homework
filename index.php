<?php

//1) создать интерфейс Animal и реализовать классы Fox, Elephant и Pigeon
interface IAnimal {
    public function getSizeOfAnimal(): string;
    public function getNameOfAnimal(): string;
    public function makeSound(): string;
    public function search($animal): string;
} 


//2) использовать множественное наследование при помощи интерфейсов и добавить интерфейсы Movale, Eatable
interface IMovable{
    public function getTypeOfMoving(): string;
    public function getMovementSpeed(): string;
}
        
interface IEatable{
    public function getEatableInfo(): string;
}
  
class Fox implements IAnimal, IMovable, IEatable { 
    function __construct(){ //5) При создании экземпляра каждого из классов создать метод который будет выводить, что животное по ключу name (из файла) относится к данному классу
        $array = $this->parseJson(); //Я реализовал функцию в конструкторе, потому что только он может вызываться непосредственно при создании нового экземпляра
        foreach ($array as $innerArray) {
            if (is_array($innerArray)){
                foreach ($innerArray as $key=>$val) {
                    if ($val == $this->getNameOfAnimal()){
                        echo $innerArray['name']. "belongs to this class<br>";
                    }
                }
            } else {
                echo "Animal isn't in the list";
            }
        }
    }

    private string $sizeOfAnimal = "normal";
    private string $nameOfAnimal = "Fox";
    private string $typeOfMoving = "walk/run";
    private string $movementSpeed = "fast";
    private string $eatable = "eatable but a pity";

    use JsonParsing, Logging;

    public function getSizeOfAnimal(): string{
        return $this->sizeOfAnimal;
    }

    public function getNameOfAnimal(): string{
        return $this->nameOfAnimal;
    }

    public function makeSound(): string{
        return "bark!";
    }

    public function getTypeOfMoving(): string {
        return $this -> typeOfMoving;
    }
    public function getMovementSpeed(): string {
        return $this -> movementSpeed;
    }

    public function getEatableInfo(): string {
        return $this -> eatable;
    }

    public function search($animal): string { //4)добавить метод к каждому классу, который проверяет в файле по ключу type животное в списке

        // $array = implode(" ",array_map(function($a) {return implode(" ",$a);},$this->parseJson()));
        // if (preg_match("/$animal/",$array)){
        //     return "Element ". $animal. " is finded!";
        // } else {
        //     return "Animal isn't in the list";  // Тут вариант через регулярку, он выглядит немного лучше, но не такой функциональный
        // }

        $array = $this->parseJson();
        $finded = false;
        foreach ($array as $innerArray) {
            if (is_array($innerArray)){
                foreach ($innerArray as $key=>$value) {
                    if ($key == "type" && $value == $animal){
                        return "Element ". $animal. " is finded!";
                    }
                }
            } else {
                echo "Animal isn't in the list";
            }
        }
        if (!$finded){
            return "Animal isn't in the list";
        } // Я помню, что реализовывать цикл, через два foreach нехорошо, но я альтернатив вообще не нашел
    }
}

$fox = new Fox;
echo $fox->getNameOfAnimal()." is ".$fox->getSizeOfAnimal()." size animal and make sound ". $fox->makeSound()."<br>";
echo $fox->getNameOfAnimal()." way of traveling is ". $fox->getTypeOfMoving(). " and movement speed is ". $fox->getMovementSpeed().".<br>";
echo $fox->getNameOfAnimal()." meat is ". $fox->getEatableInfo().".<br><br>";

class Elephant implements IAnimal, IMovable, IEatable{
    function __construct(){
        $array = $this->parseJson();
        foreach ($array as $innerArray) {
            if (is_array($innerArray)){
                foreach ($innerArray as $key=>$val) {
                    if ($val == $this->getNameOfAnimal()){
                        echo $innerArray['name']. "belongs to this class<br>";
                    }
                }
            } else {
                echo "Animal isn't in the list";
            }
        }
    }
    private string $nameOfAnimal = "Elephant";
    private string $sizeOfAnimal = "big";
    private string $typeOfMoving = "walk";
    private string $movementSpeed = "slow";
    private string $eatable = "eatable but a pity and scary";

    use JsonParsing, Logging;

    public function getSizeOfAnimal(): string{
        return $this->sizeOfAnimal;
    }
    
    public function getNameOfAnimal(): string{
        return $this->nameOfAnimal;
    }

    public function makeSound(): string{
        return "trumpet!";
    }

    public function getTypeOfMoving(): string {
        return $this -> typeOfMoving;
    }

    public function getMovementSpeed(): string {
        return $this -> movementSpeed;
    }

    public function getEatableInfo(): string {
        return $this -> eatable;
    }
    
    public function search($animal): string {
        $array = $this->parseJson();
        $finded = false;
        foreach ($array as $innerArray) {
            if (is_array($innerArray)){
                foreach ($innerArray as $key=>$value) {
                    if ($key == "type" && $value == $animal){
                        return "Element ". $animal. " is finded!";
                    }
                }
            } else {
                echo "Animal isn't in the list";
            }
        }
        if (!$finded){
            return "Animal isn't in the list";
        }
    }
}

$elephant = new Elephant;
echo $elephant->getNameOfAnimal()." is ".$elephant->getSizeOfAnimal()." size animal and make sound ". $elephant->makeSound()."<br>";
echo $elephant->getNameOfAnimal()." way of traveling is ". $elephant->getTypeOfMoving(). " and movement speed is ". $elephant->getMovementSpeed().".<br>";
echo $elephant->getNameOfAnimal()." meat is ". $elephant->getEatableInfo().".<br><br>";


class Pigeon implements IAnimal {

    function __construct(){
        $array = $this->parseJson();
        foreach ($array as $innerArray) {
            if (is_array($innerArray)){
                foreach ($innerArray as $key=>$val) {
                    if ($val == $this->getNameOfAnimal()){
                        echo $innerArray['name']. "belongs to this class<br>";
                    }
                }
            } else {
                echo "Animal isn't in the list";
            }
        }
    }

    private string $nameOfAnimal = "Pegion";
    private string $sizeOfAnimal = "small";
    private string $typeOfMoving = "walk/fly";
    private string $movementSpeed = "fast";
    private string $eatable = "eatable but a pity";

    use JsonParsing, Logging;

    public function getSizeOfAnimal(): string{
        return $this->sizeOfAnimal;
    }

    public function getNameOfAnimal(): string{
        return $this->nameOfAnimal;
    }

    public function makeSound(): string{
        return "coo!";
    }
    
    public function getTypeOfMoving(): string {
        return $this -> typeOfMoving;
    }

    public function getMovementSpeed(): string {
        return $this -> movementSpeed;
    }

    public function getEatableInfo(): string {
        return $this -> eatable;
    }

    public function search($animal): string {
        $array = $this->parseJson();
        $finded = false;
        foreach ($array as $innerArray) {
            if (is_array($innerArray)){
                foreach ($innerArray as $key=>$value) {
                    if ($key == "type" && $value == $animal){
                        return "Element ". $animal. " is finded!";
                    }
                }
            } else {
                echo "Animal isn't in the list";
            }
        }
        if (!$finded){
            return "Animal isn't in the list";
        }
    }
}

$pigeon = new Pigeon;
echo $pigeon->getNameOfAnimal()." is ".$pigeon->getSizeOfAnimal()." size animal and make sound ". $pigeon->makeSound()."<br>";
echo $pigeon->getNameOfAnimal()." way of traveling is ". $pigeon->getTypeOfMoving(). " and movement speed is ". $pigeon->getMovementSpeed().".<br>";
echo $pigeon->getNameOfAnimal()." meat is ". $pigeon->getEatableInfo().".<br><br>";

//3) создать дерикторию Animal.txt и поместить туда json строку. Создать терйт, который получает данные из файла и приобразовывает их в массив

trait JsonParsing {
    public string $jsonstr = '';
    public function parseJson(): array{
        $jsonstr = json_decode(file_get_contents('./Animal.txt'),true);
        return $jsonstr;
    }
}

trait Logging { // 6) создать трейт, который логирует записи не подходящие ни к одному классу
    public function log(): void{
        if (!preg_match('/Element/', $this->search($this->getNameOfAnimal()))){
            $error = $this->getNameOfAnimal(). " doesn't belong to any class";
            file_put_contents('./log.txt', $error);
            echo "Log added!";
        } else {
            echo "Everything ok";
        }
    }
}

echo $fox->search($fox->getNameOfAnimal())."<br>";
echo $elephant->search($elephant->getNameOfAnimal())."<br>";
echo $pigeon->search($pigeon->getNameOfAnimal())."<br><br>";

echo $fox->log()."<br>";
echo $elephant->log()."<br>";
echo $pigeon->log()."<br>";