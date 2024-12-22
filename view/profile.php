<body style="min-height: 100vh;">
<?php             require __DIR__ . '/componentes/modalAlterPassword.php';
?>
<div style="min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container">
        <div class="row text-center">
            <h1>Perfil</h1>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <form action="../src/controller/UserController.php" class="row g-3 p-4 border m-4" method="post">
                <div class="col-md-12">

                    <!-- start Nome -->
                    <div class="col-md-7 mb-4 mx-auto">
                        <label class="form-label" for="nome">Nome</label>
                        <input required type="text" name="nome" id="nome" value="<?php echo $user['nome']; ?>" class="form-control form-control-lg"/>
                    </div>
                    <!-- end Nome -->
                    <input id="idUser" name="idUser" type="hidden" value="<?php echo $user['id']; ?>"/>
                    <!-- start Email -->
                    <div class="col-md-7 mb-4 mx-auto">
                        <label class="form-label" for="email">Email</label>
                        <input required type="email" id="email" name="email" value="<?php echo $user['email']; ?>" class="form-control form-control-lg"/>
                    </div>
                    <!-- end Email -->
                </div>
                <div id="divPasswordEditUser"  class="row text-center">
                    <a href="" data-mdb-toggle="modal" data-mdb-target="#alterPasswordModal">Alterar senha</a>
                </div>
                <div class="row text-center">
                    <div class="lg-4">
                        <button class="btn btn-secondary" type="submit" name="btnEditUser">Salvar</button>

                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
