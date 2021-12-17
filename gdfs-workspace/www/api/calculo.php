<?php 

require_once '../bootstrap.php';

try{
    $categoriaId = $_POST['categoria_id'];
    $cidadeId = $_POST['cidade_id'];
    $enderecoPartida = $_POST['endereco_partida'];
    $enderecoDestino = $_POST['endereco_destino'];

    $distancia = rand(0, 100); 
    $duracao = round(rand(0, 60) / 60, 2); 
    $hora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

    $categoria = $repository->getCategoria($categoriaId);

    $total = $categoria['bandeirada'] 
        + $distancia * $categoria['valor_km']
        + $duracao *  $categoria['valor_hora'];
    $total = round($total, 2);

    $dadosHistorico = [
        'cidade_id' => $cidadeId,
        'categoria_id' => $categoriaId,
        'endereco_partida' => $enderecoPartida,
        'endereco_destino' => $enderecoDestino,
        'bandeirada' => $categoria['bandeirada'],
        'valor_hora' => $categoria['valor_hora'],
        'valor_km' => $categoria['valor_km'],
        'total' => $total,
        'hora' => $hora->format('Y-m-d H:i:s'),
        'distancia' => $distancia,
        'duracao' => $duracao,
    ];

    $repository->saveHistorico($dadosHistorico);

    $dadosHistorico['hora'] = $hora->format('d/m/Y H:i:s');
    $resposta = $dadosHistorico;
}
catch(Exception $ex){
    $resposta = [
        'status' => 'erro',
        'message' => $ex->getMessage()
    ];
}

header('Content-Type', 'application/json');
echo json_encode($resposta);



