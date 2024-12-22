<p id="testeMiopiaE"></p>
<div class="d-flex justify-content-center align-items-center">
    <div style="max-height: 600px;max-width: 600px;min-height: 300px;min-width: 300px;" class="position-relative">

        <div class="row">
            <button id="upE" onclick="girarImagemE('upE')" class="btn-up btn btn-outline-danger btn-arrow position-absolute top-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-up"></span>
            </button>
        </div>


        <div class="position-absolute top-50 start-0 translate-middle-y">
            <button id="leftE" onclick="girarImagemE('leftE')" class="btn-left btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-left"></span>
            </button>

        </div>

        <div id="simboloE" class="position-absolute top-50 start-50 translate-middle">
            <h1 class="EE" id="EE">E</h1>
        </div>

        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button id="rightE" onclick="girarImagemE('rightE')" class="btn-right btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-right"></span>
            </button>
        </div>


        <div class="row ">
            <button id="downE" onclick="girarImagemE('downE')" class="btn-down btn btn-outline-danger btn-arrow position-absolute bottom-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-down"></span>
            </button>
        </div>
    </div>
</div>


<script>

    let totalRotationE = 0;
    let currentSizeE = 100.8;
    let currentDirectionE = 'rightE';
    let previousDirectionE = 'rightE';
    const directionsE = ['rightE', 'downE', 'leftE', 'upE'];
    let clickCountE = 0;
    let acertosTesteMiopiaOlhoEsquerdo = 0;
    let resultadoTMEsquerdo;

    function girarImagemE(buttonDirection) {
        const imagem = document.getElementById('EE');
        const randomDegrees = getRandomRotationE();
        totalRotationE += randomDegrees;
        const newRotation = totalRotationE % 360;
        imagem.style.transform = `rotate(${newRotation}deg)`;

        currentSizeE -= 16.8;
        imagem.style.fontSize = `${currentSizeE}px`;

        updatecurrentDirectionE(newRotation);
        checkDirectionE(buttonDirection);

        clickCountE++;
        if (clickCountE === 6) {
            changeSessionE();
        }
    }

    function getRandomRotationE() {
        const rotations = [90, 180, 270];
        const randomIndex = Math.floor(Math.random() * rotations.length);
        return rotations[randomIndex];
    }

    function updatecurrentDirectionE(newRotation) {
        const positionIndex = Math.floor(newRotation / 90) % 4;
        previousDirectionE = currentDirectionE;
        currentDirectionE = directionsE[positionIndex];
    }

    function checkDirectionE(buttonDirection) {
        if (buttonDirection === previousDirectionE) {
            console.log('Acertou!');
            acertosTesteMiopiaOlhoEsquerdo++;
        } else {
            console.log('Errou!');
        }
        if (acertosTesteMiopiaOlhoEsquerdo < 3) {
            resultadoTMEsquerdo = "RUIM";
        } else if (acertosTesteMiopiaOlhoEsquerdo >= 3 && acertosTesteMiopiaOlhoEsquerdo <= 4) {
            resultadoTMEsquerdo = "REGULAR";
        } else {
            resultadoTMEsquerdo = "ÓTIMO";
        }
        console.log(resultadoTMEsquerdo);
    }



    function changeSessionE() {
        console.log('Mudar de sessão após o 6º clique');
        const btnNext = document.getElementById('next');
        btnNext.click();
    }

</script>