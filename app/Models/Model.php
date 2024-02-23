<?php

namespace App\Models;

use App\Database\Connection;
use PDO;
use PDOException;
use stdClass;

abstract class Model
{
    protected $data;
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

    protected function create(string $entity, array $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $stmt = Connection::getInstance()->prepare("INSERT INTO {$entity} ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter($data));
            return Connection::getInstance()->lastInsertId();
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
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

    protected function update(string $entity, array $data, string $terms, string $params)
    {
        try {
            $dataSet = [];
            foreach ($data as $bind => $value) {
                $dataSet[] = "{$bind} = :{$bind}";
            }
            $dataSet = implode(", ", $dataSet);
            parse_str($params, $params);
            $stmt = Connection::getInstance()->prepare("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");
            $stmt->execute($this->filter(array_merge($data, $params)));
            return ($stmt->rowCount() ?? 1);
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function delete(string $entity, string $terms, string $params)
    {
        try {
            $stmt = Connection::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");
            parse_str($params, $params);
            $stmt->execute($params);
            return ($stmt->rowCount() ?? 1);
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function safe(): array
    {
        $safe = (array)$this->data;
        foreach (static::$safe as $unset) {
            unset($safe[$unset]);
        }

        return $safe;
    }

    protected function filter(array $data): array
    {
        $filter = [];
        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        }

        return $filter;
    }
}