<?php

//1)сделать две страницы index.php и hello.php на первой страницу сделать форму, на второй вывести информацию если есть сессия
//2) селать тоже самое только через cookies
?>

<form action="hello.php" method="get">
    <fieldset>
        <legend>Client ID</legend>
        <p>
            <label for="firstname">Name: </label>
            <input name="firstname" type="text" pattern = "\D{2,}"/>
        </p>
        <p>
            <label for="lastname">Surname: </label>
            <input name="lastname" type="text" pattern = "\D{2,}"/>
        </p>
    </fieldset>

    <button>Enter</button>

</form>