<?php

class UserRepository extends Repository
{
    const TABLE = "users";

    public function __construct()
    {
        parent::__construct();
        $this->table = self::TABLE;
    }

    public function create($data)
    {
        $cryptedPassword = password_hash($data["password"], PASSWORD_BCRYPT);

        $sql = 'INSERT INTO '. $this->table . ' (email, password, admin) VALUES (:n, :p, :a)';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['email'],
            'p' => $cryptedPassword,
            'a' => 0
        ]);

        return $insert->rowCount();
    }
}
