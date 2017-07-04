<?php

require_once('login.php');

if(!Login::getInstance()->isAutenticado()){
    header("Location: world-autenticacao.php");
    die();
}