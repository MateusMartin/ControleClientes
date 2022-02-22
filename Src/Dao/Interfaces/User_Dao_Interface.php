<?php

namespace Dao;
use Classes\Database;
use Classes\User;

interface User_Dao_Interface
{
    public function insertUser(Database $conexao, User $login);

    public function findUserById(Database $conexao, $id);

    public function findUserByLogin(Database $conexao, $login);

    public function login(Database $conexao, $login, $senha);

    public function getLestId(Database $conexao);


}
