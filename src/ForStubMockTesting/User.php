<?php

namespace App\ForStubMockTesting;

class User
{
    private string $name;

    private string $email;

    public function __construct()
    {
        echo 'constructor was called';
    }

    public function createUser(string $name, string $email): bool
    {
        $this->name = $name;
        $this->email = $email;

        if ($this->validate()) {
            return $this->save();
        }

        return false;
    }

    public function validate(): bool
    {
        return $this->name && filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function save(): bool
    {
        echo 'user was saved in database - real operation';
        return true;
    }
}