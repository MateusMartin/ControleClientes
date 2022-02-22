<?php

namespace Dao;

use Classes\Telefone;
use Classes\Database;

interface Telefone_Dao_Interface
{

    public function insertTelefone(Database $conexao, Telefone $telefone);

    public function editTelefone(Database $conexao, Telefone $telefone);

    public function deleteTelefone(Database $conexao,$idTelefone);

    public function findTelefoneByClientId(Database $conexao, $id);

    public function getLestId(Database $conexao);

}