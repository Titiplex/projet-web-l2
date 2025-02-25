<?php

namespace model;

final class User extends Model {
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

    public function __construct(int $id, string $email, string $username, string $password)
    {
        parent::__construct($id);
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
}