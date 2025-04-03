<?php
namespace model;

require_once "Model.php";

/**
 * @property string $email
 * @property string $name
 * @property string $firstname
 * @property string $tel
 * @property string $password
 * @property Role $role
 */
class User extends Model {

    protected string $name;

    protected  string $firstname;
    protected string $password;

    protected string $email;

    protected Role $role;

    protected string $tel;

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

}