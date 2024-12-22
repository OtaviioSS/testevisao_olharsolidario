<div class="modal fade" id="recoverPasswordModal" tabindex="-1" aria-labelledby="recoverPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="../../src/controller/UserController.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="recoverPasswordModalLabel">Recuperar senha</h5>

                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <p> Enviaremos um link para o seu email para você recuperar a conta.</p>

                    </div>
                    <div class="row">
                        <!-- start Email -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="emailRecoverPassword">Email</label>
                            <input required type="email" id="emailRecoverPassword" name="emailRecoverPassword" class="form-control form-control-lg"/>
                        </div>
                    </div>


                    <div class="row">
                        <div class="lg-12 d-flex justify-content-center align-items-center align-text-center">
                            <button class="btn btn-secondary" type="submit" name="btnRecoverPasword">Enviar</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>