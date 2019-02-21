<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 22:18
 */

if(isset($_POST['Submit'])){
    $data = [
        $_POST['ip'],
        '|',
        $_POST['port'],
        '|',
        $_POST['db'],
        '|',
        $_POST['username'],
        '|',
        $_POST['password'],
        '|'
    ];

    file_put_contents('files/db.cfg',$data,0, NULL);
    echo "File Updated";
}







?>


<form method="post">
    Host:<br>
    <input type="text" name="ip" value="127.0.0.1"><br>
    Port:<br>
    <input type="text" name="port" value="5432"><br>
    Database:<br>
    <input type="text" name="db" value="galileo"><br>
    Username:<br>
    <input type="text" name="username" value="postgres"><br>
    Password:<br>
    <input type="text" name="password" value="postgres"><br><br>
    <input type="submit" value="Submit" name="Submit">
</form>
