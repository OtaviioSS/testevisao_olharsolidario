<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuários</title>
</head>
<body>
<section class="">
    <div class="container py-5 h-100">
        <button type="button" class="btn btn-warning next-button" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Novo Usuario
        </button>
        <div class="row mt-5 mb-5">
            <section class="panel border p-3">
                <table id="myUsersTable" name="myUsersTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $consulta = $this->connection->query("SELECT * FROM tb_user");
                    foreach ($consulta as $row) : ?>
                        <tr>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td>
                                <div class="row">
                                    <a class="col-4" href="editUser?idUser=<?= $row['id']; ?>">Editar</a>
                                    <a class="col-4 ms-2" href="javascript:void(0);" onclick="confirmDelete(<?= $row['id']; ?>)">Excluir</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </section>
        </div>
    </div>
</section>

<script>
    function confirmDelete(id) {
        const confirmAction = confirm("Tem certeza que deseja excluir este usuário?");
        if (confirmAction) {
            // Redireciona para a URL de exclusão
            window.location.href = "deleteUser?idUser=" + id;
        }
    }

    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Senhas diferentes!");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
