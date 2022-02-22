<?php

namespace Dao;

use Classes\Cliente;
use Classes\Database;

class ClienteDao implements Cliente_Dao_Interface
{

    public function insertUser(Database $conexao, Cliente $cliente)
    {
        $Strquery = "INSERT INTO Clientes (idCliente,Nome,Cpf,Tipo,Dtnasc,Usuario_idUsuario) VALUES ({$cliente->getIdCliente()},'{$cliente->getNome()}','{$cliente->getCpf()}','{$cliente->getTipo()}','{$cliente->getDtNasc()}',{$cliente->getUsuarioIdUsuario()})";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function editCliente(Database $conexao, Cliente $cliente)
    {
        $Strquery = "Update Clientes set Nome = '{$cliente->getNome()}', Cpf = '{$cliente->getCpf()}', Tipo = '{$cliente->getTipo()}', Dtnasc = '{$cliente->getDtNasc()}' where idCliente = {$cliente->getIdCliente()}  ";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function deleteCliente(Database $conexao, $idCliente)
    {
        $Strquery = "Delete From Clientes where idCliente = {$idCliente}  ";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function findClienteByUserId(Database $conexao, $id)
    {
        $Strquery = "SELECT * from Clientes where Usuario_idUsuario = '{$id}'";
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
            $query      = $conexao->query("SELECT max(idCliente)+1 as idCliente from Clientes");
            $id   = $query->fetchAll();
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $id;
    }
}