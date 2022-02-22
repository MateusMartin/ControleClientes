<?php

require_once('Src/Dao/Interfaces/User_Dao_Interface.php');
require_once('Src/Dao/UserDao.php');
require_once('Src/Classes/Database.php');
require_once('Src/Classes/User.php');

use Dao\UserDao as usrDAO;
use Classes\User as user;
use Classes\Database as dataBase;

if($_POST['action'] == 'criarUser')
{
    $user = new user();
    $user->setNome($_POST['login']);
    $user->setSenha($_POST['senha']);

    criarUsuario($user);

}


function criarUsuario(user $user)
{
    $daoUser = new usrDAO();
    $dataBase = new dataBase();
    $findUser = $daoUser->findUserByLogin($dataBase,$user->getNome());
    $CountU = count($findUser);

    if($CountU > 0)
    {
        $jsonRet = 'UsuarioExistente';
        echo json_encode($jsonRet);

    }else
    {
        $lestId = $daoUser->getLestId($dataBase);
        if($lestId[0]['idUser'] == null)
        {
            $lestId[0]['idUser'] = 1;
        }
        $user->setIdUsuario($lestId[0]['idUser']);
        $result = $daoUser->insertUser($dataBase,$user);
        if($result == 0)
        {
            $jsonRet = 'success';
            echo json_encode($jsonRet);
        }
        else
        {
            $jsonRet = 'error';
            echo json_encode($jsonRet);
        }


    }


}
