<div class="container">
    <div class="row d-flex justify-content-center my-3">
        <div class="col-12">
            <p id="testeAstigE"></p>
        </div>
        <div class="d-flex justify-content-center align-items-center col-lg-7">
            <img class="img-fluid" style="width: 300px"  src="<?php echo $dir; ?>/util/img/teste3black.png" alt="Roda de Maddox">
        </div>
        <div class="row d-flex justify-content-center mt-5 col-6">
            <div class="btn-group" role="group">
                <button id="botaoSimTesteAstigmatismoE" class="btn btn-outline-danger text-center yes-or-no-button" onclick="escolherOpcaoAstigmatismoE('sim')">Sim</button>
                <button id="botaoNaoTesteAstigmatismoE" class="btn btn-outline-danger text-center yes-or-no-button" onclick="escolherOpcaoAstigmatismoE('nao')">Não</button>
            </div>
        </div>
    </div>
</div>


<script>
    let resultadoTAEsquerdo;

    function escolherOpcaoAstigmatismoE(opcao) {

        console.log("Astigmatismo2? " + opcao)
        if (opcao === 'sim') {
            resultadoTAEsquerdo = "RUIM";
            const btnNext = document.getElementById('next');
            btnNext.click();
        } else if (opcao === 'nao') {
            resultadoTAEsquerdo = "ÓTIMO";
            const btnNext = document.getElementById('next');
            btnNext.click();
        }
    }


</script>