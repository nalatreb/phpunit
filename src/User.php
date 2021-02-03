<?php

namespace App;

class User
{
    protected string $name;
    private string $lastName;

    public function __construct($name, $lastName)
    {
        $this->name = ucfirst($name);
        $this->lastName = ucfirst($lastName);
    }

    public function getFullName(): string
    {
        return "{$this->name} {$this->lastName}";
    }
}
