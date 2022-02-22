<?php


require_once('Src/Dao/Interfaces/User_Dao_Interface.php');
require_once('Src/Dao/UserDao.php');
require_once('Src/Classes/Database.php');
require_once('Src/Classes/User.php');

use Dao\UserDao as usrDAO;
use Classes\User as user;
use Classes\Database as dataBase;


if($_POST['action'] == 'Logar')
{
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    logar($login, $senha);
} else if ($_POST['action'] == 'Deslogar')
{
    deslogar();
}

function logar($login, $senha)
{

    $dataBase = new dataBase();
    $userDAO = new usrDAO();
    $user = $userDAO->login($dataBase,$login,$senha);
    echo json_encode($user[0]);
    session_start();
    $_SESSION['idUsuario'] = 1;

}

function deslogar()
{
    session_start();
    $_SESSION['idUsuario'] = 0;
    echo json_encode("Success");

}