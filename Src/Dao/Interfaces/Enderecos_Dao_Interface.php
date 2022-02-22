<?php
namespace Dao;

use Classes\Database;
use Classes\Endereco;

interface Enderecos_Dao_Interface
{

    public function insertEndereco(Database $conexao, Endereco $endereco);

    public function editEndereco(Database $conexao, Endereco $endereco);

    public function deleteEndereco(Database $conexao,$idEnderecos);

    public function findEnderecoByClientId(Database $conexao, $id);

    public function getLestId(Database $conexao);
}
