<?php

class ProductRepository extends Repository
{
    const TABLE = "products";

    public function __construct()
    {
        parent::__construct();
        $this->table = self::TABLE;
    }

    public function create(array $data): int
    {
        $sql = 'INSERT INTO '. $this->table . ' (name, description, quantity, price, id_category) VALUES (:n, :d, :q, :p, :idc)';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['name'],
            'd' => $data['description'],
            'q' => $data['quantity'],
            'p' => $data['price'],
            'idc' => !empty($data['id_category']) ? $data['id_category'] : $data['category'],
        ]);

        return $insert->rowCount();
    }

    public function update(array $data): int
    {
        $sql = 'UPDATE '. $this->table . ' SET name = :n, description = :d, quantity =:q, price = :p, id_category = :idc WHERE id = :id';
        $insert = $this->co->prepare($sql);
        $insert->execute([
            'n' => $data['name'],
            'd' => $data['description'],
            'q' => $data['quantity'],
            'p' => $data['price'],
            'id' => $data['id'],
            'idc' => !empty($data['id_category']) ? $data['id_category'] : $data['category'],
        ]);

        return $insert->rowCount();
    }
}
