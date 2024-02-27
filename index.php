<?php

//1-2) сделать форму-анкету с отправкой на сервер и сформировать данные анкеты в массив


?>

<form action="server.php" method="get">
    <fieldset>
        <legend>Client ID</legend>
        <P>
            <label for="firstName">Name: </label>
            <input name="firstName" type="text" required pattern="[A-Za-z]{2,}" />
        </P>
        <P>
            <label for="lastName">Surename: </label>
            <input name="lastName" type="text" required pattern="[A-Za-z]{2,}" />
        </P>
        <P>
            <label for="phoneNumber">Phonenumber: </label>
            <input name="phoneNumber" type="tel"  required placeholder="+375-44-123-45-67"  pattern="[+]375-\d{2}-\d{3}-\d{2}-\d{2}" />
        </P>
        <P>
            <label for="address">Address: </label>
            <input name="address" type="text" required title="Country city street" pattern="[A-Za-z]{3,}\s[A-Za-z-\s?A-Za-z]{3,}\s[A-Za-z-\s?A-Za-z]{3,}"/>
        </P>
        <P>
            <label for="birthday">Birthday: </label>
            <input name="birthday" type="text" required title="DD-MM-YY" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/>
        </P>
            <!-- Здесь должен быть тип data, но я его изменил в целях удобства и красоты  -->
        <P>
            <label for="email">Email: </label>
            <input name="email" type="email" required/>
        </P>
            <label><input type="radio" name="radio" value="Male" required/>Male</label>
            <label><input type="radio" name="radio" value="Female" required/>Female</label>
    </fieldset>

    <button type="submit">Enter</button>
</form>


