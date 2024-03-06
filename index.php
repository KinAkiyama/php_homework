<?php
//1)записать данные из формы в файл
?>
<form action="server.php" method="POST">
    <fieldset>
        <legend><h3>Client ID</h3></legend>
        <p>
            <label for="username">Username: </label>
            <input name="username" type="text"/>
        </p>
        <p>
            <label for="password">Password: </label>
            <input name="password" type="text"/>
        </p>
        <legend><h3>Second task</h3></legend>
        <p>
            <label for="number">Enter the num: </label>
            <input name="number" type="text"/>
        </p>
        <legend><h3>Fourh task</h3></legend>
        <p>
            <label for="string">Enter the string: </label>
            <input name="string" type="text"/>
        </p>
        <legend><h3>Sixth task</h3></legend>
        <p>
            <label for="file">File: </label>
            <input name="file" type="file"/>
        </p>
    </fieldset>

    <button>Enter</button>
</form>
