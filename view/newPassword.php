<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oticas Muniz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>


<style>
    #intro {
        background-image: url(https://images.pexels.com/photos/2325446/pexels-photo-2325446.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
        height: 100vh;

    }

    /* Height for devices larger than 576px */

</style>
<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-md-8">
                    <form action="../src/controller/UserController.php" method="post" class="bg-white  rounded-3 shadow-3-strong p-5">
                        <h3 class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                 class="bi bi-unlock" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"/>
                            </svg>
                        </h3>
                        <h2 class="text-center">Redefinir a minha senha</h2>
                        <p class="text-center">Digite a sua nova senha</p>
                        <div class="panel-body">

                            <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                <label style="text-align: left" class="text-left" for="dessenha">Nova Senha</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input type="password" id="inputNewPasswor" name="inputNewPasswor" class="form-control">

                                    </div>
                                </div>
                                <div class="text-center mt-3 form-group d-grid gap-2">
                                    <input class="btn btn-danger" type="submit" name="buttonResetPassword"
                                           value="Redefinir">
                                </div>

                                <input type="hidden" class="hide" name="token" id="token" value="">
                                <input type="hidden" class="hide" name="userID" id="userID" value="<?php echo $user['id']; ?>">
                            </form>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer style="margin-top: auto" class="bg-dark text-center text-white">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="https://www.incub.com.br/">Incub Developer</a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>



</body>
</html>
