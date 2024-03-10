<?php

//1) вычислить факториал числа используя класс
class Factorial {
    private $num;
    
    public function setNumber($number): void {
      $this->num = $number;
    }
    
    public function getNumber(): int {
      return $this->num;
    }
    
    public function calculateFactorial(): int{
      $factorial = 1;
      for ($i=1;$i<=$this->num;$i++){
        $factorial *= $i;
      }
      return $factorial;
    }
  } 
  
  $fact = new Factorial();
  $fact->setNumber(5);
  echo "1) <br> Факториал числа 5 ->". $fact->calculateFactorial()."<br><br>";

//2) создать класс Калькулятор при помощи методов и классов
  class Calculator {
    private int $number1;
    private int $number2;
    
    public function setFirstNum($num): void{
      $this->number1 = $num;
    }
    public function setSecondNum($num): void{
      $this->number2 = $num;
    }

    public function getFirstNum(): float{
        return $this->number1;
      }
      public function getSecondNum(): float{
        return $this->number2;
      }
    
    public function sum (): float{
      return $this->number1 + $this->number2;
    }
    
    public function sub (): float{
      return $this->number1 - $this->number2;
    }
    
    public function mult (): float{
      return  $this->number1 * $this->number2;
    }
    
    public function divis (): float{
      return $this-> number1/ $this-> number2;
    }
  }
  
  $result = new Calculator();
  $result->setFirstNum(5);
  $result->setSecondNum(12);
  echo "2) <br> Сумма чисел 5 и 12 ->".$result->sum()."<br>";
  echo "Разность чисел 5 и 12 ->".$result->sub()."<br>";
  echo "Произведение чисел 5 и 12 ->".$result->mult()."<br>";
  echo "Частное чисел 5 и 12 ->".$result->divis()."<br><br>";

?>

<form action="server.php" method="POST">
    <fieldset>
        <legend>Registration</legend>
        <p>
            <label for="username">Username: </label>
            <input name="username" type="text"/>
        </p>
        <p>
            <label for="password">Password: </label>
            <input name="password" type="text"/>
        </p>
    </fieldset>
    <button type="submit">Enter</button>
</form>


<?php
//4) создать родительский класс Фигура и дочерний класс Круг 
  class Figure {
    private float $heigth;
    private float $width;
    
    public function setHeigth($num): void{
      $this->heigth = $num;
    }
    public function setWidth($num): void{
      $this->width = $num;
    }
    
    public function Area (): float{
      /////
    }
  }
  
  class Circle extends Figure {
    private float $radius;
    
    public function setRadius($num): void{
      $this->radius = $num;
    }
    
    public function Area(): float{
      return pi()*$this->radius*$this->radius;
    }
  }
  
  $circle = new Circle();
  $circle->setRadius(5);
  echo "4) <br> Площадь круга радиусом 5 ->". $circle->Area()."<br>";