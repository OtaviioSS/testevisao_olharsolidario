<div class="container">
    <div class="row d-flex justify-content-center my-3">
        <div class="col-12">
            <p id="testeAstigD"></p>
        </div>
        <div class="d-flex justify-content-center align-items-center col-lg-7">
            <img class="img-fluid" style="width: 300px" src="<?php echo $dir; ?>/util/img/teste3black.png" alt="Roda de Maddox">
        </div>
        <div class="row d-flex justify-content-center mt-5 col-6">
            <div class="btn-group" role="group">
                <button id="botaoSimTesteAstigmatismo" class="btn btn-outline-danger text-center yes-or-no-button" onclick="escolherOpcaoAstigmatismo('sim')">Sim</button>
                <button id="botaoNaoTesteAstigmatismo" class="btn btn-outline-danger text-center yes-or-no-button" onclick="escolherOpcaoAstigmatismo('nao')">Não</button>
            </div>
        </div>
    </div>
</div>

<script>
    let resultadoTesteAstigmatismoOlhoDireito = false;
    let resultadoTADireito;

    function escolherOpcaoAstigmatismo(opcao) {

        console.log("Astigmatismo1? " + opcao)
        if (opcao === 'sim') {
            const btnNext = document.getElementById('next');
            btnNext.click();
            resultadoTADireito = "RUIM";
            btnNext.click();
        } else if (opcao === 'nao') {
            resultadoTADireito = "ÓTIMO";
            const btnNext = document.getElementById('next');
            btnNext.click();
        }
    }


</script>