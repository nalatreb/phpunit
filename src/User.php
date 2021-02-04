<?php

namespace App;

class User
{
    protected string $name;
    private string $lastName;
    private Database $db;

    public function __construct($name, $lastName)
    {
        $this->name = ucfirst($name);
        $this->lastName = ucfirst($lastName);
        $this->db = new Database();
    }

    public function getFullName(): string
    {
        $this->db->getEmailAndLastName();
        return "{$this->name} {$this->lastName}";
    }

    protected function hashPassword(): string
    {
        return 'password hashed!';
    }
}
