<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $nick;
    private $id;
    private $image;


    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function __construct(string $email, string $password, string $name, string $surname, string $nick)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->nick = $nick;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }


    public function getSurname(): string
    {
        return $this->surname;
    }


    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }


    public function getNick(): string
    {
        return $this->nick;
    }

    public function setNick(string $nick)
    {
        $this->nick = $nick;
    }


}