<div>
    <div class="modal fade" id="alterPasswordModal" tabindex="-1" aria-labelledby="alterPasswordModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="../../src/controller/UserController.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="recoverPasswordModalLabel">Recuperar senha</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label" for="inputPassword">Digite a nova senha</label>
                                <input required type="password" name="inputPassword" id="inputPassword" class="form-control form-control-lg"/>
                            </div>

                            <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label" for="confirm_password">Confirme a Senha</label>
                                <input required type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg"/>
                            </div>
                        </div>

                        <div class="row">
                            <input type="hidden" name="userID" value="<?php echo $_GET['id_user']; ?>">
                            <button class="btn btn-secondary" id="btnUpdatePassword" name="btnUpdatePassword" type="submit">Confirmar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
