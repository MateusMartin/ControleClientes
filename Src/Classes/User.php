<?php

namespace Classes;

class User
{
    private $idUsuario;
    private $Nome;
    private $Senha;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario): void
    {
        $this->idUsuario = $idUsuario;
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
    public function getSenha()
    {
        return $this->Senha;
    }

    /**
     * @param mixed $Senha
     */
    public function setSenha($Senha): void
    {
        $this->Senha = $Senha;
    }

    public function retJson()
    {
        $ret = "{ idUsuario: " + $this->getIdUsuario() + ", nome:" + $this->getNome() + ", senha: "+ $this->getSenha() + "}";
        return $ret;
    }



}