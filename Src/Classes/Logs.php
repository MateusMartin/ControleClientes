<?php

namespace Classes;

class Logs
{
    private $idLogs;
    private $Descricao;
    private $Usuario_idUsuario;

    /**
     * @return mixed
     */
    public function getIdLogs()
    {
        return $this->idLogs;
    }

    /**
     * @param mixed $idLogs
     */
    public function setIdLogs($idLogs): void
    {
        $this->idLogs = $idLogs;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->Descricao;
    }

    /**
     * @param mixed $Descricao
     */
    public function setDescricao($Descricao): void
    {
        $this->Descricao = $Descricao;
    }

    /**
     * @return mixed
     */
    public function getUsuarioIdUsuario()
    {
        return $this->Usuario_idUsuario;
    }

    /**
     * @param mixed $Usuario_idUsuario
     */
    public function setUsuarioIdUsuario($Usuario_idUsuario): void
    {
        $this->Usuario_idUsuario = $Usuario_idUsuario;
    }


}