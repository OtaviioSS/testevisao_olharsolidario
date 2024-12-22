<p id="testeContrasteE"></p>
<div class="d-flex justify-content-center align-items-center">
    <div style="max-height: 600px;max-width: 600px;min-height: 300px;min-width: 300px;" class="position-relative">

        <div class="row">
            <button id="upCE" onclick="girarImagemCE('upCE')" class="btn-up btn btn-outline-danger btn-arrow position-absolute top-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-up"></span>
            </button>
        </div>

        <div class="position-absolute top-50 start-0 translate-middle-y">
            <button id="leftCE" onclick="girarImagemCE('leftCE')" class="btn-left btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-left"></span>
            </button>
        </div>

        <div id="simboloCE" class="position-absolute top-50 start-50 translate-middle">
            <img style="width: 100.8px;height: auto;" class="CE" id="CE" src="<?php echo $dir;?>/util/img/c.png" alt="">
        </div>

        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button id="rightCE" onclick="girarImagemCE('rightCE')" class="btn-right btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-right"></span>
            </button>
        </div>

        <div class="row">
            <button id="downCE" onclick="girarImagemCE('downCE')" class="btn-down btn btn-outline-danger btn-arrow position-absolute bottom-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-down"></span>
            </button>
        </div>
    </div>
</div>


<script>
    let totalRotationCE = 0;
    let currentSizeCE = 100.8;
    let currentDirectionCE = 'rightCE';
    let previousDirectionCE = 'rightCE';
    const directionsCE = ['rightCE', 'downCE', 'leftCE', 'upCE'];
    let clickCountCE = 0;
    let opacityCE = 1.0;
    let acertosTesteContrasteOlhoEsquerdo = 0;
    let resultadoTCEsquerdo;


    function girarImagemCE(buttonDirection) {
        const imagem = document.getElementById('CE');
        const randomDegrees = getRandomRotationCE();
        totalRotationCE += randomDegrees;
        const newRotation = totalRotationCE % 360;
        imagem.style.transform = `rotate(${newRotation}deg)`;


        currentSizeCE -= 16.8;
        imagem.style.width = `${currentSizeCE}px`;

        updateOpacityCE(imagem);

        updatecurrentDirectionCE(newRotation);
        checkDirectionCE(buttonDirection);

        clickCountCE++;
        if (clickCountCE === 6) {
            changeSessionCE();
        }
    }

    function getRandomRotationCE() {
        const rotations = [90, 180, 270];
        const randomIndex = Math.floor(Math.random() * rotations.length);
        return rotations[randomIndex];
    }

    function updatecurrentDirectionCE(newRotation) {
        const positionIndex = Math.floor(newRotation / 90) % 4;
        previousDirectionCE = currentDirectionCE;
        currentDirectionCE = directionsCE[positionIndex];
        console.log('Direção atual: ', currentDirectionCE);
    }

    function checkDirectionCE(buttonDirection) {
        console.log('Botão clicado:', buttonDirection);
        console.log('Direção anterior:', previousDirectionCE);

        if (buttonDirection === previousDirectionCE) {
            console.log('Acertou!');
            acertosTesteContrasteOlhoEsquerdo++;
            console.log(acertosTesteContrasteOlhoEsquerdo)
        } else {
            console.log('Errou!');
        }
        if (acertosTesteContrasteOlhoEsquerdo < 3){
            resultadoTCEsquerdo = "RUIM";
        }else if (acertosTesteContrasteOlhoEsquerdo >= 3 && acertosTesteContrasteOlhoEsquerdo <= 4){
            resultadoTCEsquerdo = "REGULAR";
        }else {
            resultadoTCEsquerdo = "ÓTIMO";
        }
        console.log(resultadoTCEsquerdo);
    }



    function changeSessionCE() {
        console.log('Mudar de sessão após o 6º clique');
        const btnNext = document.getElementById('next');
        btnNext.click();
    }

    function updateOpacityCE(element) {
        opacityCE -= 0.1666;
        element.style.transition = 'opacity 0.5s ease-out';
        element.style.opacity = opacityCE.toFixed(2);
    }

</script>