<?php
namespace Dao;
use Classes\Cliente;
use Classes\Database;

interface Cliente_Dao_Interface
{

    public function insertUser(Database $conexao, Cliente $cliente);

    public function editCliente(Database $conexao, Cliente $cliente);

    public function deleteCliente(Database $conexao,$idCliente);

    public function findClienteByUserId(Database $conexao, $id);

    public function getLestId(Database $conexao);

}