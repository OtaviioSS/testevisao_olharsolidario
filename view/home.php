<?php
require_once "src/util/constants.php";
$dir = DIR_DEV;
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Teste de visão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="src/util/style.css">

</head>
<body>
<div class="container">

    <div class="svg-container" id="svg_wrap"></div>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center">
            <img style="min-width: 64px;max-width: 150px" class="img-fluid" id="logo" src="<?php echo $dir ?>/util/img/logo.png" alt="">
        </div>

    </div>
    <section id="formulario" class="section col-lg-8">

        <div class="row d-flex justify-content-center align-items-center align-text-center">
            <p>Para tornar sua experiência com o teste ainda melhor,
                gostaríamos de saber seu nome e idade. </p>
            <div class="col-lg-8">
                <label class="label" for="nome"></label>
                <input class="form-control" name="nome" id="nome" type="text" placeholder="Nome" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]*">
            </div>
            <div class="col-lg-8">
                <label for="idade"></label>
                <input class="form-control" name="idade" id="idade" type="number" placeholder="Idade" min="1" max="120" required style="-moz-appearance: textfield;">
            </div>
        </div>


        <div class="row d-flex justify-content-center mt-1">
            <div class="col-12">
                <p style="font-size: 14pt; margin: 8px">Você já usa óculos?</p>
            </div>
            <div class="btn-group col-lg-8" role="group">
                <button id="botaoSim" class="btn btn-outline-danger btn-sm text-center yes-or-no-button" onclick="escolherOpcao('sim')">Sim</button>
                <button id="botaoNao" class="btn btn-outline-danger btn-sm text-center yes-or-no-button" onclick="escolherOpcao('nao')">Não</button>
            </div>
            <h5 id="useOculos" style="display: none; font-size: 12pt;">Coloque os oculos para realizar o teste.</h5>
        </div>
        <button type="button" id="enviarDados" onclick="formDados()" class="button next-button">Continuar</button>
    </section>
    <section style="display: none" class="section">
        <div class="row d-flex justify-content-center">
            <div class="row">
                <p id="mensagemDistancia">Mantenha o seu dispositivo a uma distância de no mínimo 1 metro durante o teste.</p>
            </div>
            <div class="row justify-content-center align-items-center">
                <img class="w-50" src="src/util/img/perfil.png" alt="ajuste de distancia">
            </div>
        </div>
        <button type="button" id="next" class="button btn next-button">
            Continuar <i style="font-weight: bold;" class="bi bi-chevron-right "></i>
        </button>

    </section>
    <section style="display: none" class="section">
        <h3>Verificação de olhos</h3>
        <?php require_once "view/verificacao_olho_direito.php" ?>
    </section>
    <section style="display: none" class="section">
        <h3>TESTE DE MIOPIA</h3>
        <?php require_once "view/teste_miopia.php" ?>
    </section>
    <section style="display: none" class="section">
        <?php require_once "view/teste_astigmatismo.php" ?>
    </section>
    <section style="display: none" class="section">
        <?php require_once "view/teste_contraste.php" ?>
    </section>
    <section style="display: none" class="section">
        <h3>Verificação de olhos</h3>
        <?php require_once "view/verificacao_olho_esquerdo.php" ?>
    </section>
    <section style="display: none" class="section">
        <?php require_once "view/teste_miopiaE.php" ?>
    </section>
    <section style="display: none" class="section">
        <?php require_once "view/teste_astigmatismoE.php" ?>
    </section>
    <section style="display: none" class="section">
        <?php require_once "view/teste_contrasteE.php" ?>
    </section>
    <section style="display: none" class="section">
        <p>Precisamos do seu número de WhatsApp para te enviar o resultado. </p>
        <label class="my-3">
            <input id="inputWhatsapp" name="inputWhatsapp" class="form-control" type="tel" placeholder="Whatsapp"/>
            <span style="font-size: 9pt; color: #ffffff">Ao enviar, concordo com os <a href="view/termos_de_uso.php">termos de uso</a> </span>

        </label>

        <div class="row d-flex justify-content-center my-3">
            <!--            <div class="btn btn-danger" id="sendResult">Continuar &rarr;</div>-->
            <input data-inputmask="'mask': '(99) 9999-9999'" class="button next-button button-enviar" type="button" value="Enviar" id="enviarResultado">
        </div>
    </section>
    <section style="display: none" class="section">
        <div class="row">
            <p id="resultadoTexto"></p>
        </div>
        <div class="row col-12 col-lg-12">
            <h1 style="color: #ffffff; font-weight: bold;" id="resultadoTitulo"></h1>

        </div>
        <div class="col-12 ">
            <span><i style="font-size: 120px; width: 100px; color: #ffffff;" id="resultadoEmoji"></i></span>

        </div>
        <div class="col-12">
            <p>Clique em "Enviar" para receber o seu resultado e falar com um especialista.</p>
            <input type="button" id="sendWhatsapp" class="button btn btn-lg next-button" value="Enviar">
        </div>

    </section>


    <div style="visibility: hidden" class="button next-button" id="prev">&larr; Voltar</div>
    <div style="visibility: hidden" class="button next-button" id="next">Continuar &rarr;</div>
    <!--    <div class="button" id="submit">Agree and send application</div>-->
<!--    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center">
            <img style="min-width: 100px;max-width: 150px" class="img-fluid" id="logo" src="<?php /*echo $dir */?>/util/img/logo-incub.png" alt="">
        </div>

    </div>-->
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script src="src/util/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>

