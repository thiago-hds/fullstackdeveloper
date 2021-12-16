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

    public function getCategoria($id)
    {
        $query = "SELECT * FROM categorias WHERE id = ?;";

        $statement = $this->db->prepare($query);
        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function saveHistorico($data)
    {
        $query = "
            INSERT INTO historicos(cidade_id, categoria_id, endereco_partida, endereco_destino, bandeirada, valor_hora, valor_km, total, hora, distancia, duracao)
            VALUES (:cidade_id, :categoria_id, :endereco_partida, :endereco_destino, :bandeirada, :valor_hora, :valor_km, :total, :hora, :distancia, :duracao)
        ";

        $statement = $this->db->prepare($query);
        $statement->execute($data);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    
}