



<p id="testeMiopiaD"></p>

<div class="d-flex justify-content-center align-items-center">
    <div style="max-height: 600px;max-width: 600px;min-height: 300px;min-width: 300px;" class="position-relative">

        <div class="row">
            <button id="up" onclick="girarImagem('up')" class="btn-up btn btn-outline-danger btn-arrow position-absolute top-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-up"></span>
            </button>
        </div>

        <div class="position-absolute top-50 start-0 translate-middle-y">
            <button id="left" onclick="girarImagem('left')" class="btn-left btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-left"></span>
            </button>

        </div>

        <div id="simbolo" class="position-absolute top-50 start-50 translate-middle">
            <h1 class="E" id="E">E</h1>
        </div>

        <div class="position-absolute top-50 end-0 translate-middle-y">
            <button id="right" onclick="girarImagem('right')" class="btn-right btn btn-outline-danger btn-arrow next-button">
                <span class="bi bi-arrow-right"></span>
            </button>
        </div>


        <div class="row ">
            <button id="down" onclick="girarImagem('down')" class="btn-down btn btn-outline-danger btn-arrow position-absolute bottom-0 start-50 translate-middle-x next-button">
                <span class="bi bi-arrow-down"></span>
            </button>
        </div>

    </div>
</div>


<script>
    let totalRotation = 0;
    let currentSize = 100.8;
    let currentDirection = 'right';
    let previousDirection = 'right';
    const directions = ['right', 'down', 'left', 'up'];
    let clickCount = 0;
    let acertosTesteMiopiaOlhoDireito = 0;
    let resultadoTMDireito;

    function girarImagem(buttonDirection) {
        const imagem = document.getElementById('E');
        const randomDegrees = getRandomRotation();
        totalRotation += randomDegrees;
        const newRotation = totalRotation % 360;
        imagem.style.transform = `rotate(${newRotation}deg)`;

        currentSize -= 16.8;
        imagem.style.transform += ` scale(${currentSize / 100.8})`; // Atualiza o valor do scale

        updateCurrentDirection(newRotation);
        checkDirection(buttonDirection);

        clickCount++;
        if (clickCount === 6) {
            changeSession();
        }
    }

    function getRandomRotation() {
        const rotations = [90, 180, 270];
        const randomIndex = Math.floor(Math.random() * rotations.length);
        return rotations[randomIndex];
    }

    function updateCurrentDirection(newRotation) {
        const positionIndex = Math.floor(newRotation / 90) % 4;
        previousDirection = currentDirection;
        currentDirection = directions[positionIndex];
    }

    function checkDirection(buttonDirection) {
        if (buttonDirection === previousDirection) {
            console.log('Acertou!');
            acertosTesteMiopiaOlhoDireito++;
            console.log(acertosTesteMiopiaOlhoDireito)
        } else {
            console.log('Errou!');
        }
        if (acertosTesteMiopiaOlhoDireito < 3) {
            resultadoTMDireito = "RUIM";
        } else if (acertosTesteMiopiaOlhoDireito >= 3 && acertosTesteMiopiaOlhoDireito <= 4) {
            resultadoTMDireito = "REGULAR";
        } else {
            resultadoTMDireito = "ÓTIMO";
        }
        console.log(resultadoTMDireito);

    }



    function changeSession() {
        const btnNext = document.getElementById('next');
        btnNext.click();
    }
</script>