<?php

namespace Dao;

use Classes\Database;
use Classes\Logs;

interface Logs_Dao_Interface
{

    public function getLestId(Database $conexao);
    public function registraLogs(Database $conexao, Logs $log );


}


