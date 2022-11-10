<?php

class CategoryRepository extends Repository
{
    const TABLE = "category";

    public function __construct()
    {
        parent::__construct();
        $this->table = self::TABLE;
    }

    public function create($data)
    {
        $sql = 'INSERT INTO '. $this->table . ' (name) VALUES (:n)';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['email'],
        ]);

        return $insert->rowCount();
    }
}
