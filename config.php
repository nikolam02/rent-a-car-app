<?php

$konekcija = mysqli_connect("localhost","root","","balkandrive");

if($konekcija->connect_error)
{
    die("Connection error");
}

?>