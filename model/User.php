<?php

namespace model;

final class User extends Model implements DbInterface {
    private string $username {
        get => $this->username;
        set(string $username) => $this->username = $username;
    }
    private string $password {
        get => $this->password;
        set(string $password) => $this->password = $password;
    }

    private string $email {
        get => $this->email;
        set(string $email) => $this->email = $email;
    }

    public function __construct(int $id, string $email, string $username, string $password) {
        parent::__construct($id);
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    function selectById(int $id) : User
    {
        // TODO: Implement selectById() method.
    }

    static function selectAll() : array
    {
        // TODO: Implement selectAll() method.
    }

    function insert(User|Model $data) : bool
    {
        // TODO: Implement insert() method.
    }

    function update(User|Model $data) : bool
    {
        // TODO: Implement update() method.
    }

    function delete(int $id) : bool
    {
        // TODO: Implement delete() method.
    }
}