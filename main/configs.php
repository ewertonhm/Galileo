<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 23:14
 */

$path = "config/";
$diretorio = dir($path);

echo "<strong>".$path."</strong> files':<br />";
while($arquivo = $diretorio -> read()){
    echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
}
$diretorio -> close();
?>