<?php

//1) Вынести валидацию различных полей в отдельный класс со статическими переменными и проверять через статические методы данные


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
