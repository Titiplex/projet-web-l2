<?php

namespace model;

require_once __DIR__ . '/Model.php';

class Role extends Model
{
    public string $role_name;

    public function __construct(int $id, string $role_name) {
        parent::__construct($id);
        $this->role_name = $role_name;
    }

    public function getRoleName(): string
    {
        return $this->role_name;
    }
}