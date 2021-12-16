<?php 

class Repository
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCidades()
    {
        $query = "SELECT * FROM cidades;";

        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategorias()
    {
        $query = "SELECT * FROM categorias;";

        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}