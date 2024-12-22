<form action="../../src/controller/UserController.php" method="post">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Usuario</h5>

        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <div class="row">
            <input name="idUser" id="idUser" hidden value="<?php echo $user['id'] ?>">
            <!-- start Nome -->
            <div class="col-md-6 mb-4">
                <label class="form-label" for="nome">Nome</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>" class="form-control form-control-lg"/>
            </div>
            <!-- end Nome -->

            <!-- start Email -->
            <div class="col-md-6 mb-4">
                <label class="form-label" for="email">Email</label>
                <input required type="email" id="email" name="email" value="<?php echo $user['email'] ?>" class="form-control form-control-lg"/>
            </div>

            <!-- end Email -->

        </div>


        <div class="row">
            <div class="lg-12 d-flex justify-content-center align-items-center align-text-center">
                <button class="btn btn-secondary" type="submit" name="btnEditUser">Salvar</button>

            </div>

        </div>


    </div>

</form>
