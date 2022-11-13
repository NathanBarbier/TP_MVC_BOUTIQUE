<?php

class CategoryRepository extends Repository
{
    const TABLE = "categories";

    public function __construct()
    {
        parent::__construct();
        $this->table = self::TABLE;
    }

    public function create(array $data): int
    {
        $sql = 'INSERT INTO '. $this->table . ' (name) VALUES (:n)';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['name'],
        ]);

        return $insert->rowCount();
    }

    public function update(array $data): int
    {
        $sql = 'UPDATE '. $this->table . ' SET name = :n WHERE id = :id';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['name'],
            'id' => $data['id'],
        ]);

        return $insert->rowCount();
    }
}
