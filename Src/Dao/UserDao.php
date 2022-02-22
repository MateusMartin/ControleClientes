<?php

namespace Dao;
use Classes\Database;
use Classes\User;
use mysql_xdevapi\Exception;
use Exception as Ex;

class UserDao implements User_Dao_Interface
{



    public function insertUser(Database $conexao, User $User)
    {
        $Strquery = "INSERT INTO Usuarios (idUsuario, nome, senha) VALUES ({$User->getIdUsuario()}, '{$User->getNome()}', '{$User->getSenha()}'); SELECT CAST(SCOPE_IDENTITY() AS INT);";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function findUserById(Database $conexao, $id)
    {
        // TODO: Implement findUserById() method.
    }

    public function  login(Database $conexao, $login, $senha)
    {
        try{
        $conexao = Database::getConnection();
        $query      = $conexao->query("SELECT * from usuarios where nome='{$login}' and senha='{$senha}'");
        $usr   = $query->fetchAll();
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $usr;
    }

    public function getLestId(Database $conexao)
    {
        try{
            $conexao = Database::getConnection();
            $query      = $conexao->query("SELECT max(idUsuario)+1 as idUser from usuarios");
            $id   = $query->fetchAll();
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $id;
    }

    public function findUserByLogin(Database $conexao,$login)
    {
        try{
            $conexao = Database::getConnection();
            $query      = $conexao->query("SELECT * from usuarios where nome='{$login}'");
            $usr   = $query->fetchAll(\PDO::FETCH_CLASS);
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $usr;
    }

}