<?php

namespace model;

/**
 * @property string role_name
 */
class Role extends Model
{
    protected string $role_name;

    public function __construct(int $id, string $role_name) {
        parent::__construct($id);
        $this->role_name = $role_name;
    }
}