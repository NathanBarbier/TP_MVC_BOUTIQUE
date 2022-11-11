<?php

abstract class Repository extends BDD
{
    protected string $table;

    public function findOneById(int $id)
    {
        $sql = 'SELECT * FROM '. $this->table .' WHERE id = :id';
        $select = $this->co->prepare($sql);
        $select->execute(['id' => $id]);

        return $select->fetch(PDO::FETCH_ASSOC);
    }

    public function findOneBy(array $criteria = [])
    {
        try {
            $sql = 'SELECT * FROM '. $this->table;

            if (!empty($criteria)) {
                $sql .= " WHERE 1 ";
                foreach ($criteria as $key => $value) {
                    echo $key . " " . $value;
                    $sql .= " AND " . $key . " = '" . $value ."'";
                }
            }

            echo $sql;

            $select = $this->co->query($sql);

            return $select->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function findAll(): array
    {
        try {
            $sql = 'SELECT * FROM '. $this->table;
            $select = $this->co->prepare($sql);
            $select->execute();

            return $select->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    public function findBy(array $criteria = []): array
    {
        try {
            $sql = 'SELECT * FROM '. $this->table;

            if (!empty($criteria)) {
                $sql .= " WHERE 1 ";
                foreach ($criteria as $key => $value) {
                    $sql .= " AND " . $key . " = " . $value;
                }
            }

            $select = $this->co->query($sql);

            return $select->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM '. $this->table .' WHERE id = :id';
        $delete = $this->co->prepare($sql);
        $delete->execute(['id' => $id]);

        return $delete->rowCount();
    }
}
