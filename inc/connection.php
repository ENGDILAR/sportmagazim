<?php

$conn =  mysqli_connect('localhost','root','','corsedb');
if(!$conn)
{
    die('ERROR'.mysqli_connect_error());
}

?>