<?php

namespace App\Models;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static string $entity = "users";

    public function boostrap(string $first_name, string $last_name, string $email, string $document)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->document = $document;

        return $this;
    }

    public function load(int $id, ?string $columns = '*'): ?User
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        if ($this->fail() || !$load->rowCount()) {
            $this->message = "Usuario não encontrado, para o id informado";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    public function find(string $email, ?string $columns = '*'): ?User
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        if ($this->fail() || !$find->rowCount()) {
            $this->message = "Usuário não encontrado, para o e-mail informado";
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    public function all(int $limit = 30, int $offset = 0, ?string $columns = '*'): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :l OFFSET :o ", "l={$limit}&o={$offset}");
        if ($this->fail() || !$all->rowCount()) {
            $this->message = "Sua consulta não retornou usuários";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function save()
    {
        if (!$this->required()) {
            return null;
        }

        if (!empty($this->id)) {
            $userID = $this->id;
        }

        if (empty($this->id)) {
            if ($this->find($this->email)) {
                return $this->message = "O e-mail informado já esta cadastrado";
            }

            $userID = $this->create(self::$entity, $this->safe());

            if ($this->fail()) {
                return $this->message = "Erro ao cadastrar verifique os dados";
            }

            return $this->message = "Cadastro realizado com sucesso";
        }
        return $this->data = $this->read("SELECT * FROM users WHERE id = :id", "id={$userID}")->fetch();
    }

    public function destroy()
    {

    }

    private function required()
    {
        if (empty($this->first_name) || empty($this->last_name) || empty($this->email)) {
            return $this->message = "Nome, Sobrenome e e-mail são obrigatorios";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return $this->message = "O e-mail informado não é valido";
        }

        return true;
    }
}