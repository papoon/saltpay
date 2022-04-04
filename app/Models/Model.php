<?php
namespace Models;

class Model {

    private $db;
    public function __construct(\Opis\Database\Database $db)
    {
        $this->db = $db;
    }

    /**
     *
     * @return array
     */
    public function all(): array
    {
        return $this->db->from($this->table)->select()->all();
    }

    /**
     *
     * @param array $fields
     * @return void
     */
    public function insert(array $fields): void
    {
        $this->db->insert($fields)->into($this->table);
    }
}