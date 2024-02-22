<?php

namespace App\Models;

use App\Database\Connection;
use PDO;
use PDOException;
use stdClass;

abstract class Model
{
    protected ?object $data;
    protected ?PDOException $fail = null;
    protected ?string $message;

    public function __set(string $name, $value): void
    {
        if (empty($this->data)) {
            $this->data = new StdClass();
        }

        $this->data->$name = $value;
    }

    public function __isset(string $name): bool
    {
        return isset($this->data->$name);
    }

    public function __get(string $name)
    {
        return ($this->data->$name ?? null);
    }

    public function data(): ?object
    {
        return $this->data;
    }

    public function fail(): ?PDOException
    {
        return $this->fail;
    }

    public function message(): ?string
    {
        return $this->message;
    }

    protected function create()
    {

    }

    protected function read(string $select, array|string $params): false|\PDOStatement|null
    {
        try {
            $stmt = Connection::getInstance()->prepare($select);
            if ($params) {
                parse_str($params, $params);
                foreach ($params as $key => $value) {

                    $type = (is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();

            return $stmt;
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe(): ?array
    {
        return [];
    }

    private function filter()
    {

    }
}