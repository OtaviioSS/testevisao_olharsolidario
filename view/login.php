<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
            rel="stylesheet"
    />
</head>


<body>
<section class="" style="background-color: #c00048;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>

                        </div>

                        <div class="col-md-6 col-lg-7 d-flex align-items-center">

                            <div class="card-body p-4 p-lg-5 text-black">
                                <form id="loginForm" action="../src/controller/UserController.php" method="POST">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0">
                                            <img class="img" src="../src/util/img/logo.png" style="width: 150px; height: 124px" alt="logo">
                                            </span>

                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Insira seus dados de acesso</h5>
                                    <div class="form-outline mb-4">
                                        <input type="email" name="emailLogin" id="emailLogin" class="form-control form-control-lg"/>
                                        <label class="form-label" for="emailLogin">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="passwordLogin" name="passwordLogin" class="form-control form-control-lg"/>
                                        <label class="form-label" for="passwordLogin">Senha</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <div class="alert" style="display:none;"></div>
                                        <div id="pageMessages"></div>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <input type="hidden" name="btnLoginUser" value="btnLoginUser">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="btnLoginUser" name="btnLoginUser">Entrar</button>
                                    </div>
                                    <a href="" class="small text-muted" data-mdb-toggle="modal" data-mdb-target="#recoverPasswordModal">Esqueceu a Senha?</a>
                                    <!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Não tem uma conta? <a href="view/registrer_user.php" style="color: #393f81;">Registre-se</a></p> -->
                                    <p></p>
                                    <a href="#!" class="small text-muted">Terms of use. </a>

                                    <a href="#!" class="small text-muted">Privacy policy</a>


                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="/src/util/js/alertPopup.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            let dataForm = $('#loginForm').serialize();
            console.log(dataForm)
            $.ajax({
                url: "../src/controller/UserController.php",
                type: 'POST',
                data: dataForm,
                dataType: 'json',
                success: function (response) {
                    console.log("eponse:", response.responseText)
                    console.log("Response code:", response.status)
                    window.location.href = '/clientes';


                },
                error: function (xhr, status, error) {
                    console.log("Erro na requisição AJAX:", status);
                    console.log("Erro na resposta:", xhr.status);
                    console.log(status.data);
                    if (xhr.status === 400) {
                        createAlert('Erro', 'Campos obrigatórios não preenchidos.', xhr.message, 'danger', false, true, 'pageMessages');
                    } else if (xhr.status === 401) {
                        createAlert('', 'Credenciais inválidas.', null, 'danger', false, true, 'pageMessages');
                    } else {
                        createAlert('Erro', 'Tivemos um problema!', 'Ocorreu um erro desconhecido!', 'danger', false, true, 'pageMessages');
                    }
                }
            });
        });
    });


</script>
</body>


</html>