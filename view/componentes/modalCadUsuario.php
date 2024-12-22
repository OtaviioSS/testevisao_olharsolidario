<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="../../src/controller/UserController.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo Usuario</h5>

          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row">

            <!-- start Nome -->
            <div class="col-md-6 mb-4">
              <label class="form-label" for="nome">Nome</label>
              <input required type="text" name="nome" id="nome" class="form-control form-control-lg" />
            </div>
            <!-- end Nome -->

            <!-- start Email -->
            <div class="col-md-6 mb-4">
              <label class="form-label" for="email">Email</label>
              <input required type="email" id="email" name="email" class="form-control form-control-lg" />
            </div>

            <!-- end Email -->

          </div>



          <div class="row">
            <div class="col-md-6 mb-4 pb-2">
              <label class="form-label" for="password">Digite sua senha</label>
              <input required type="password" name="password" id="password" class="form-control form-control-lg" />
            </div>

            <div class="col-md-6 mb-4 pb-2">
              <label class="form-label" for="confirm_password">Confirme a Senha</label>
              <input required type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" />
            </div>


          </div>

          <div class="row">
            <div class="lg-12 d-flex justify-content-center align-items-center align-text-center">
              <button class="btn btn-secondary" type="submit" name="btnResgiterUser">Registrar</button>

            </div>
      
          </div>




        </div>
     
      </form>
    </div>
  </div>
</div>