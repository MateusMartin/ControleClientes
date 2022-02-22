<?php

namespace Dao;

use Classes\Database;
use Classes\Logs;

class LogsDao implements Logs_Dao_Interface
{

    public function getLestId(Database $conexao)
    {
        try{
            $conexao = Database::getConnection();
            $query      = $conexao->query("SELECT max(idLogs)+1 as idLogs from Log_acesso");
            $id   = $query->fetchAll();
        } catch (Ex $ex)
        {
            return $ex;
        }
        return $id;
    }

    public function registraLogs(Database $conexao, Logs $log)
    {
        $Strquery = "INSERT INTO log_acesso (idLogs,Descricao,Usuario_idUsuario) VALUES ({$log->getIdLogs()},'{$log->getDescricao()}',{$log->getUsuarioIdUsuario()})";
        try{
            $conexao = Database::getConnection();
            $exc      = $conexao->exec($Strquery);
        } catch (Ex $exc)
        {
            return $exc;
        }
        return $exc;
    }
}