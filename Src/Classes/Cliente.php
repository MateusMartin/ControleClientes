<?php

namespace Classes;

class Cliente
{
    private $idCliente;
    private  $Nome;
    private $Cpf;
    private $Tipo;
    private $DtNasc;
    private $Usuario_idUsuario;

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome): void
    {
        $this->Nome = $Nome;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->Cpf;
    }

    /**
     * @param mixed $Cpf
     */
    public function setCpf($Cpf): void
    {
        $this->Cpf = $Cpf;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @param mixed $Tipo
     */
    public function setTipo($Tipo): void
    {
        $this->Tipo = $Tipo;
    }

    /**
     * @return mixed
     */
    public function getDtNasc()
    {
        return $this->DtNasc;
    }

    /**
     * @param mixed $DtNasc
     */
    public function setDtNasc($DtNasc): void
    {
        $this->DtNasc = $DtNasc;
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