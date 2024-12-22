<?php


namespace src\Model;


class User

{


    private $email;

    private $password;

    private $nome;

    private $idUser;


    /**
     * Get the value of email
     */

    public function getEmail()

    {

        return $this->email;

    }


    /**
     * Set the value of email
     */

    public function setEmail($email): self

    {

        $this->email = $email;


        return $this;

    }


    /**
     * Get the value of password
     */

    public function getPassword()

    {

        return $this->password;

    }


    /**
     * Set the value of password
     */

    public function setPassword($password): self

    {

        $this->password = $password;


        return $this;

    }


    /**
     * Get the value of nome
     */

    public function getNome()

    {

        return $this->nome;

    }


    /**
     * Set the value of nome
     */

    public function setNome($nome): self

    {

        $this->nome = $nome;


        return $this;

    }

    /**
     * @return mixed
     */
    function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     * @return User
     */
    function setIdUser($idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }
}





