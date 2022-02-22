<?php

namespace Dao;

use Classes\Database;
use Classes\Endereco;

class EnderecoDao implements Enderecos_Dao_Interface
{


    public function insertEndereco(Database $conexao, Endereco $endereco)
    {
        $Strquery = "INSERT INTO Enderecos (idEndereco,Logradouro,Numero,Complemento,Bairro, Cep, Uf, Enderecocol,Cliente_idCliente) 
                        VALUES ({$endereco->getIdEndereco()},'{$endereco->getLogradouro()}','{$endereco->getNumero()}','{$endereco->getComplemento()}', '{$endereco->getBairro()}'
                        , '{$endereco->getCep()}','{$endereco->getUF()}','{$endereco->getEnderecocol()}',{$endereco->getClienteIdCliente()})";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function editEndereco(Database $conexao, Endereco $endereco)
    {
        $Strquery = "Update Enderecos set logradouro = '{$endereco->getLogradouro()}', Numero = '{$endereco->getNumero()}', complemento = '{$endereco->getComplemento()}', Bairro = '{$endereco->getBairro()}', Cep = '{$endereco->getCep()}', Uf = '{$endereco->getUF()}', Enderecocol = '{$endereco->getEnderecocol()}' where idEndereco = {$endereco->getIdEndereco()} ";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function deleteEndereco(Database $conexao, $idEnderecos)
    {
        $Strquery = "Delete From Enderecos where idEndereco = {$idEnderecos}  ";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }

    public function findEnderecoByClientId(Database $conexao, $id)
    {
        $Strquery = "SELECT * from Enderecos where Cliente_idCliente = '{$id}'";
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
            $query      = $conexao->query("SELECT max(idEndereco)+1 as idEndereco from Enderecos");
            $id   = $query->fetchAll();
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $id;
    }
}