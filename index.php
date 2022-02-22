<?php

session_start();
$isTouch = isset($_SESSION['idUsuario']);

if($isTouch == false){
    $_SESSION['idUsuario'] = 0;
}


include("index.html");
