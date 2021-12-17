<?php

require_once 'bootstrap.php';

$cidades = $repository->getCidades();
$categorias = $repository->getCategorias();
?>
<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Gaudium Software - Prova Desenvolvedor Full Stack</title>
</head>
<body>
<main role="main">
    <div class="container mx-auto">
        <div class="row">
            <h1 class="mx-auto"><img src="assets/gaudium-logo.png" alt="Gaudium logo" width=100/> Gaudium Software</h1>
        </div>
        <div class="row">
            <h2 class="mx-auto">Prova Desenvolvedor Full Stack</h2>
        </div>
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="card bg-info border-primary">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="cidade_id">Cidade</label>
                                <select class="form-control" id="cidade_id" name="cidade_id">
                                    <option>Selecione uma cidade</option>
                                    <?php foreach($cidades as $cidade): ?>
                                        <option value="<?= $cidade['id'] ?>">
                                            <?= $cidade['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="categoria_id">Categoria</label>
                                <select class="form-control" id="categoria_id" name="categoria_id">
                                    <?php foreach($categorias as $categoria): ?>
                                        <option value="<?= $categoria['id'] ?>">
                                            <?= $categoria['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="endereco_partida">Endereço de Partida</label>
                                <input type="text" class="form-control" name="endereco_partida" id="endereco_partida" >
                            </div>

                            <div class="form-group">
                                <label for="endereco_destino">Endereço de Partida</label>
                                <input type="text" class="form-control" name="endereco_destino" id="endereco_destino" >
                            </div>

                            <button type="submit" class="btn btn-light btn-block">
                                Efetuar Estimativa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div id="historico" class="card-body bg-warning border-warning">
                        <p class="text-monospace text-success">
                            Em Rio de Janeiro, carro executivo, de Rua da Assembléia, 10 para Rua Barata Ribeiro, 30, às 10:34: R$ 23,15
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div> <!-- /container -->
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="assets/custom.js"></script>
</body>
</html>