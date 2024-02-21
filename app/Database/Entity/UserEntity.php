<?php

namespace App\Database\Entity;

readonly class UserEntity
{
    private int $id;
    private string $first_name;

    private string $last_name;

    private string $email;
    private string $document;

    public function get_first_name(): string
    {
        return $this->first_name;
    }
}