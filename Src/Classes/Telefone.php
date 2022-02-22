<?php

namespace Classes;

class Telefone
{
        private $idTelefone;
        private $DDD;
        private $Fone;
        private $tipo;
        private $Cliente_idCliente;

    /**
     * @return mixed
     */
    public function getIdTelefone()
    {
        return $this->idTelefone;
    }

    /**
     * @param mixed $idTelefone
     */
    public function setIdTelefone($idTelefone): void
    {
        $this->idTelefone = $idTelefone;
    }

    /**
     * @return mixed
     */
    public function getDDD()
    {
        return $this->DDD;
    }

    /**
     * @param mixed $DDD
     */
    public function setDDD($DDD): void
    {
        $this->DDD = $DDD;
    }

    /**
     * @return mixed
     */
    public function getFone()
    {
        return $this->Fone;
    }

    /**
     * @param mixed $Fone
     */
    public function setFone($Fone): void
    {
        $this->Fone = $Fone;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getClienteIdCliente()
    {
        return $this->Cliente_idCliente;
    }

    /**
     * @param mixed $Cliente_idCliente
     */
    public function setClienteIdCliente($Cliente_idCliente): void
    {
        $this->Cliente_idCliente = $Cliente_idCliente;
    }
}