<?php
namespace model;

require_once __DIR__ . '/Model.php';

class User extends Model {

    public string $name;

    public string $firstname;
    public string $password;

    public string $email;

    public Role $role;

    public string $tel;

    public function __construct(int $id, string $email, string $tel, string $name, string $firstname, string $password, Role $role)
    {
        parent::__construct($id);
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->role = $role;
        $this->tel = $tel;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


}