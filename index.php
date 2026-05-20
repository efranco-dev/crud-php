<?php
require('conexao.php');

$sql = "SELECT * FROM `cadastro`";
$statement = $pdo->query($sql);
$result = $statement->fetchAll((PDO::FETCH_ASSOC));

?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <title>Cadastros</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
</head>

<body>
    <header>

    </header>
    <main class="container">
        <form class="form d-flex gap-3 mt-3" action="cadastrar.php" method="post">
            <input autocomplete="off" placeholder="Nome" class="form-control" type="text" name="nome">
            <input autocomplete="off" placeholder="Endereço" class="form-control" type="text" name="endereco">
            <input autocomplete="off" placeholder="Telefone" class="form-control" type="text" name="telefone" maxlength="15" oninput="maskPhone(event)">
            <input autocomplete="off" placeholder="Aparelho" class="form-control" type="text" name="aparelho">
            <input autocomplete="off" placeholder="Marca" class="form-control" type="text" name="marca">
            <input autocomplete="off" placeholder="Modelo" class="form-control" type="text" name="modelo">
            <input autocomplete="off" placeholder="Defeito" class="form-control" type="text" name="defeito">
            <input autocomplete="off" placeholder="Observações" class="form-control" type="text" name="observacoes">
            <input type="submit" value="Cadastrar" class="btn btn-sm btn-success">
        </form>
        <hr>
        <table class="table table-spriped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Data de Entrada</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $row): ?>
                    <tr>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['telefone'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($row['data_entrada'])) ?></td>
                        <td class="d-flex.justfy-content-end gap-3">
                        <a class="btn btn-sm btn-primary" href="visualizar.php?id=<?= $row['id'] ?>">Ver</a>
                        <a class="btn btn-sm btn-warning" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                        <a class="btn btn-sm btn-danger" href="deletar.php?id=<?= $row['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        function maskPhone(e) {
            var v = e.target.value.replace(/\D/g,'');
            if (v.length > 10) {
                v = v.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            } else if (v.length > 5) {
                v = v.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
            } else if (v.length > 2) {
                v = v.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
            }
            e.target.value = v;
        }
    </script>
</body>

</html>