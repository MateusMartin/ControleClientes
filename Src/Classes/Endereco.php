<?php

namespace Classes;

class Endereco
{
    private $idEndereco;
    private $Logradouro;
    private $Numero;
    private $Complemento;
    private $Bairro;
    private $Cep;
    private $UF;
    private $Enderecocol;
    private $Cliente_idCliente;

    /**
     * @return mixed
     */
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    /**
     * @param mixed $idEndereco
     */
    public function setIdEndereco($idEndereco): void
    {
        $this->idEndereco = $idEndereco;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->Logradouro;
    }

    /**
     * @param mixed $Logradouro
     */
    public function setLogradouro($Logradouro): void
    {
        $this->Logradouro = $Logradouro;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @param mixed $Numero
     */
    public function setNumero($Numero): void
    {
        $this->Numero = $Numero;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->Complemento;
    }

    /**
     * @param mixed $Complemento
     */
    public function setComplemento($Complemento): void
    {
        $this->Complemento = $Complemento;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->Bairro;
    }

    /**
     * @param mixed $Bairro
     */
    public function setBairro($Bairro): void
    {
        $this->Bairro = $Bairro;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->Cep;
    }

    /**
     * @param mixed $Cep
     */
    public function setCep($Cep): void
    {
        $this->Cep = $Cep;
    }

    /**
     * @return mixed
     */
    public function getUF()
    {
        return $this->UF;
    }

    /**
     * @param mixed $UF
     */
    public function setUF($UF): void
    {
        $this->UF = $UF;
    }

    /**
     * @return mixed
     */
    public function getEnderecocol()
    {
        return $this->Enderecocol;
    }

    /**
     * @param mixed $Enderecocol
     */
    public function setEnderecocol($Enderecocol): void
    {
        $this->Enderecocol = $Enderecocol;
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