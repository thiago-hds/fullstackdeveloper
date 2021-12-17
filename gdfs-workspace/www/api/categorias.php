<?php 

require_once '../bootstrap.php';

try{
    $resposta =  $repository->getCategorias();
}
catch(Exception $ex){
    $resposta = [
        'status' => 'erro',
        'message' => $ex->getMessage()
    ];
}

header('Content-Type', 'application/json');
echo json_encode($resposta);
