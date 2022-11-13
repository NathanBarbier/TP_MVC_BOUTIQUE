<?php

class UserRepository extends Repository
{
    const TABLE = "users";

    public function __construct()
    {
        parent::__construct();
        $this->table = self::TABLE;
    }

    public function create(array $data): int
    {
        $cryptedPassword = password_hash($data["password"], PASSWORD_BCRYPT);

        $sql = 'INSERT INTO '. $this->table . ' (email, password, role) VALUES (:n, :p, :r)';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['email'],
            'p' => $cryptedPassword,
            'r' => "user"
        ]);

        return $insert->rowCount();
    }

    public function update(array $data): int
    {
        $sql = 'UPDATE '. $this->table . ' SET email = :e, role = :r WHERE id = :id';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'e' => $data['email'],
            'r' => $data['role'],
            'id' => $data['id'],
        ]);

        return $insert->rowCount();
    }
}
