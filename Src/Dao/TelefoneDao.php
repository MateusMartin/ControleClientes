<?php

namespace Dao;

use Classes\Database;
use Classes\Telefone;

class TelefoneDao implements Telefone_Dao_Interface
{

    public function insertTelefone(Database $conexao, Telefone $telefone)
    {
        $Strquery = "INSERT INTO Telefones (idTelefone,DDD,Fone,Tipo,Cliente_idCliente) VALUES ({$telefone->getIdTelefone()},'{$telefone->getDDD()}','{$telefone->getFone()}','{$telefone->getTipo()}',{$telefone->getClienteIdCliente()})";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function editTelefone(Database $conexao, Telefone $telefone)
    {
        $Strquery = "Update Telefones Set DDD = '{$telefone->getDDD()}', Fone = '{$telefone->getFone()}', Tipo = '{$telefone->getTipo()}' where idTelefone = {$telefone->getIdTelefone()} ";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function deleteTelefone(Database $conexao, $idTelefone)
    {
        $Strquery = "Delete From Telefones where idTelefone = {$idTelefone}  ";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function findTelefoneByClientId(Database $conexao, $idClie)
    {
        $Strquery = "SELECT * from Telefones where Cliente_idCliente = '{$idClie}'";
        try{
            $conexao = Database::getConnection();
            $query      = $conexao->query($Strquery);
            $result   = $query->fetchAll(\PDO::FETCH_CLASS);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $result;
    }

    public function getLestId(Database $conexao)
    {
        try{
            $conexao = Database::getConnection();
            $query      = $conexao->query("SELECT max(idTelefone)+1 as idTelefone from Telefones");
            $id   = $query->fetchAll();
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $id;
    }
}