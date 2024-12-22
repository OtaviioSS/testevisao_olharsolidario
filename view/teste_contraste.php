<p id="testeContrasteD"></p>
<div class="d-flex justify-content-center align-items-center">
    <div style="max-height: 600px;max-width: 600px;min-height: 300px;min-width: 300px;" class="position-relative">

        <div class="row">
            <button id="upC" onclick="girarImagemC('upC')" class="btn-up btn btn-outline-danger btn-arrow position-absolute top-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-up"></span>
            </button>
        </div>

        <div class="position-absolute top-50 start-0 translate-middle-y">
            <button id="leftC" onclick="girarImagemC('leftC')" class="btn-left btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-left"></span>
            </button>
        </div>

        <div id="simboloC" class="position-absolute top-50 start-50 translate-middle">
            <img style="width: 100.8px;height: auto;" class="C" id="C" src="<?php echo $dir;?>/util/img/c.png" alt="">
        </div>

        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button id="rightC" onclick="girarImagemC('rightC')" class="btn-right btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-right"></span>
            </button>
        </div>

        <div class="row">
            <button id="downC" onclick="girarImagemC('downC')" class="btn-down btn btn-outline-danger btn-arrow position-absolute bottom-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-down"></span>
            </button>
        </div>
    </div>
</div>


<script>
    let totalRotationC = 0;
    let currentSizeC = 100.8;
    let currentDirectionC = 'rightC';
    let previousDirectionC = 'rightC';
    const directionsC = ['rightC', 'downC', 'leftC', 'upC'];
    let clickCountC = 0;
    let opacityC = 1.0;
    let acertosTesteContrasteOlhoDireito = 0;
    let resultadoTCDireito;



    function girarImagemC(buttonDirection) {
        const imagem = document.getElementById('C');
        const randomDegrees = getRandomRotationC();
        totalRotationC += randomDegrees;
        const newRotation = totalRotationC % 360;
        imagem.style.transform = `rotate(${newRotation}deg)`;

        currentSizeC -= 16.8;
        imagem.style.width = `${currentSizeC}px`;
        imagem.style.height = 'auto'; // Adicione esta linha para manter a proporção da imagem

        updateOpacity(imagem);

        updatecurrentDirectionC(newRotation);
        checkDirectionC(buttonDirection);

        clickCountC++;
        if (clickCountC === 6) {
            changeSessionC();
        }
    }


    function getRandomRotationC() {
        const rotations = [90, 180, 270];
        const randomIndex = Math.floor(Math.random() * rotations.length);
        return rotations[randomIndex];
    }

    function updatecurrentDirectionC(newRotation) {
        const positionIndex = Math.floor(newRotation / 90) % 4;
        previousDirectionC = currentDirectionC;
        currentDirectionC = directionsC[positionIndex];
        console.log('Direção atual: ', currentDirectionC);
    }

    function checkDirectionC(buttonDirection) {
        console.log('Botão clicado:', buttonDirection);
        console.log('Direção anterior:', previousDirectionC);

        if (buttonDirection === previousDirectionC) {
            console.log('Acertou!');
            acertosTesteContrasteOlhoDireito++;
        } else {
            console.log('Errou!');
        }
        if (acertosTesteContrasteOlhoDireito < 3){
            resultadoTCDireito = "RUIM";
        }else if (acertosTesteContrasteOlhoDireito >= 3 && acertosTesteContrasteOlhoDireito <= 4){
            resultadoTCDireito = "REGULAR";
        }else {
            resultadoTCDireito = "ÓTIMO";
        }
        console.log(resultadoTCDireito);
    }



    function changeSessionC() {
        console.log('Mudar de sessão após o 6º clique');
        const btnNext = document.getElementById('next');
        btnNext.click();
    }

    function updateOpacity(element) {
        opacityC -= 0.1666;
        element.style.transition = 'opacity 0.5s ease-out';
        element.style.opacity = opacityC.toFixed(2);
    }

</script>