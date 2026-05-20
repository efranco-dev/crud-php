<?php

require('conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$sql = "SELECT * FROM `cadastro` WHERE id = $id";
$statement = $pdo->query($sql);
$result = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="light">
    <head>
        <title>Visualização</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
        </header>
        <main class="container">
            <div><h4>Dados Cadastrado</h4></div>
            <a href="/crud-php" class="btn btn-sm btn-danger">Sair</a>
            <p><b>Data de Entrada:</b> <?= date('d/m/Y H:i', strtotime($result['data_entrada']))?></p>
            <p><b>Nome:</b> <?= $result['nome']?></p>
            <p><b>Endereço:</b> <?= $result['endereco']?></p>
            <p><b>Telefone:</b> <?= $result['telefone']?></p>
            <p><b>Aparelho:</b> <?= $result['aparelho']?></p>
            <p><b>Marca:</b> <?= $result['marca']?></p>
            <p><b>Modelo:</b> <?= $result['modelo']?></p>
            <p><b>Defeito:</b> <?= $result['defeito']?></p>
            <p><b>Observações:</b> <?= $result['observacoes']?></p>
        </main>
        <footer>
        </footer>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
