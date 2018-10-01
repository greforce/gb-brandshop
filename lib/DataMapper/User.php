<?php

class User
{
    private $userId;
    private $login;
    private $email;
    private $password;
    private $comment;
    private $statusId;

    public function __construct(
        $userId,
        $login,
        $email,
        $password,
        $comment,
        $statusId)
    {
        $this->userId = $userId;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->comment = $comment;
        $this->statusId = $statusId;
    }

    public function getId()
    {
        return $this->userId;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getStatusId()
    {
        return $this->statusId;
    }

    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
    }
    
}