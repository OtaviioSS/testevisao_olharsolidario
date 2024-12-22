$(document).ready(function () {

    document.body.style.zoom = "reset";

    document.body.addEventListener("gesturestart", function (event) {
        event.preventDefault();
    });

    $('#inputWhatsapp').inputmask('(99) 99999-9999');

    var base_color = "#ffffff";
    var active_color = "#144c8c";


    var child = 1;
    var length = $("section").length - 1;
    $("#prev").addClass("disabled");
    $("#submit").addClass("disabled");

    $("section").not("section:nth-of-type(1)").hide();
    $("section").not("section:nth-of-type(1)").css('transform', 'translateX(100px)');

    var svgWidth = length * 200 + 24;
    var svgHeight = 24; // Ajuste este valor conforme necessário
    $("#svg_wrap").html(
        '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
        svgWidth +
        ' ' + svgHeight +
        '" xml:space="preserve"></svg>'
    );


    function makeSVG(tag, attrs) {
        var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
        for (var k in attrs) el.setAttribute(k, attrs[k]);
        return el;
    }

    for (i = 0; i < length; i++) {
        var positionX = 12 + i * 200;
        var rect = makeSVG("rect", {x: positionX, y: 10, width: 200, height: 6});
        document.getElementById("svg_form_time").appendChild(rect);
        // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
        var circle = makeSVG("circle", {
            cx: positionX,
            cy: 12,
            r: 12,
            margin: 0,
            width: positionX,
            height: 6
        });
        document.getElementById("svg_form_time").appendChild(circle);
    }

    var circle = makeSVG("circle", {
        cx: positionX + 200,
        cy: 12,
        r: 12,
        width: positionX,
        height: 6
    });
    document.getElementById("svg_form_time").appendChild(circle);

    $('#svg_form_time rect').css('fill', base_color);
    $('#svg_form_time circle').css('fill', base_color);
    $("circle:nth-of-type(1)").css("fill", active_color);


    $(".button").click(function () {
        $("#svg_form_time rect").css("fill", active_color);
        $("#svg_form_time circle").css("fill", active_color);
        var id = $(this).attr("id");
        if (id == "next") {
            $("#prev").removeClass("disabled");
            if (child >= length) {
                $(this).addClass("disabled");
                $('#submit').removeClass("disabled");
            }
            if (child <= length) {
                child++;
            }
        } else if (id == "prev") {
            $("#next").removeClass("disabled");
            $('#submit').addClass("disabled");
            if (child <= 2) {
                $(this).addClass("disabled");
            }
            if (child > 1) {
                child--;
            }
        }
        var circle_child = child + 1;
        $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
            "fill",
            base_color
        );
        $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
            "fill",
            base_color
        );
        var currentSection = $("section:nth-of-type(" + child + ")");
        currentSection.fadeIn();
        currentSection.css('transform', 'translateX(0)');
        currentSection.prevAll('section').css('transform', 'translateX(-100px)');
        currentSection.nextAll('section').css('transform', 'translateX(100px)');
        $('section').not(currentSection).hide();
    });

});

let opc = "";
let nome = ""
let idade = ""

function escolherOpcao(opcao) {
    console.log("Usa oculos? " + opcao)
    opc = opcao;
    // Remova a classe 'selecionado' de ambos os botões
    document.getElementById('botaoSim').classList.remove('selecionado');
    document.getElementById('botaoNao').classList.remove('selecionado');

    // Adicione a classe 'selecionado' ao botão clicado
    if (opcao === 'sim') {
        $("#useOculos").css('display', 'block');

        document.getElementById('botaoSim').classList.add('selecionado');
    } else if (opcao === 'nao') {
        $("#useOculos").css('display', 'none');
        document.getElementById('botaoNao').classList.add('selecionado');
    }
}


function formDados() {
    nome = document.getElementById('nome');
    idade = document.getElementById('idade');
    console.log(opc)
    if (nome.value.trim() === '' || idade.value.trim() === '' || opc === '') {
        alert("Preencha todos os campos!")
    } else {
        // document.getElementById('mensagemDistancia').textContent = nome.value + ", mantenha o seu dispositivo á distância de dois palmos durante o teste.";
        document.getElementById('mensagemTapeE').textContent = nome.value + ", tape com a mão seu olho esquerdo.";
        document.getElementById('testeMiopiaD').textContent = nome.value + ", clique na seta que indica a direção da letra E.";
        document.getElementById('testeAstigD').textContent = nome.value + ", você vê alguma linha mais ESCURA?.";
        document.getElementById('testeContrasteD').textContent = nome.value + ", clique na seta que indica a direção da C.";

        document.getElementById('mensagemTapeD').textContent = nome.value + ", tape com a mão seu olho direito.";
        document.getElementById('testeMiopiaE').textContent = nome.value + ", clique na seta que indica a direção da letra E.";
        document.getElementById('testeAstigE').textContent = nome.value + ", você vê alguma linha mais ESCURA?.";
        document.getElementById('testeContrasteE').textContent = nome.value + ", clique na seta que indica a direção da C.";
        const btnNext = document.getElementById('next');
        btnNext.click();
    }

}

let  urlWhatsapp = "";

$("#enviarResultado").on("click", function () {
    let whatsapp = document.getElementById('inputWhatsapp');
    if (whatsapp.value === null) {
        alert("Insira seu numero do whatsapp");
    } else {
        whatsapp.value = whatsapp.value.replace(/\D/g, '');
        const whatsappEmpresa = "5571986748267";
        const dataHoraAtual = new Date();
        const dataAtual = dataHoraAtual.toISOString().split('T')[0];
        const horaAtual = dataHoraAtual.toTimeString().split(' ')[0];

        function getResultadoTeste(acertos) {
            if (acertos < 3) {
                return "RUIM";
            } else if (acertos < 5 && acertos >= 3) {
                return "REGULAR";
            } else {
                return "ÓTIMA";
            }
        }


        let resultadoGeral;

        if (resultadoTMDireito === "RUIM" || resultadoTMEsquerdo === "RUIM" || resultadoTADireito === "RUIM" || resultadoTAEsquerdo === "RUIM" || resultadoTCDireito === "RUIM" || resultadoTCEsquerdo === "RUIM") {
            resultadoGeral = "RUIM"
            document.getElementById('resultadoTexto').textContent = nome.value + ", Sugerimos uma consulta com um especialista";
            document.getElementById('resultadoTitulo').textContent = "URGENTE";
            document.getElementById('resultadoEmoji').classList.add('bi', 'bi-emoji-frown', 'danger');

        } else if (resultadoTMDireito === "ÓTIMO" && resultadoTMEsquerdo === "ÓTIMO" && resultadoTADireito === "ÓTIMO" && resultadoTAEsquerdo === "ÓTIMO" && resultadoTCDireito === "ÓTIMO" && resultadoTCEsquerdo === "ÓTIMO") {
            resultadoGeral = "ÓTIMA";
            document.getElementById('resultadoTexto').textContent = nome.value + ", Sua visão esta";
            document.getElementById('resultadoTitulo').textContent = "ÓTIMA";
            document.getElementById('resultadoEmoji').classList.add('bi', 'bi-emoji-sunglasses');
        } else {
            resultadoGeral = "REGULAR"
            document.getElementById('resultadoTexto').textContent = nome.value + ", Sua visão esta";
            document.getElementById('resultadoTitulo').textContent =  "REGULAR";
            document.getElementById('resultadoEmoji').classList.add('bi', 'bi-emoji-smile');
        }
        let url = window.location.href + "src/util/r/" + whatsapp.value.replace(/\D/g, '') + ".png"
        const data = {
            nome: nome.value,
            idade: idade.value,
            dataTeste: dataAtual,
            horaTeste: horaAtual,
            resultadoTesteMiopiaOlhoDireito: resultadoTMDireito,
            resultadoTesteMiopiaOlhoEsquerdo: resultadoTMEsquerdo,
            resultadoTesteAstigmatismoOlhoDireito: resultadoTADireito,
            resultadoTesteAstigmatismoOlhoEsquerdo: resultadoTAEsquerdo,
            resultadoTesteContrasteOlhoDireito: resultadoTCDireito,
            resultadoTesteContrasteOlhoEsquerdo: resultadoTCEsquerdo,
            resultadoGeral: resultadoGeral,
            whatsapp: whatsapp.value.replace(/\D/g, '')
        };

        const resultadoExame = JSON.stringify(data);

// URL do link do WhatsApp
        urlWhatsapp = `https://wa.me/${whatsappEmpresa}?text=Ol%C3%A1,+Sou+${nome.value}+,tenho+ ${idade.value}+anos, realizei+o+teste+e+gostaria+de+agendar+um+exame+de+vista+RESULTADO%3A+${url}`;
        console.log(data)


        $.ajax({
            type: "POST",
            url: "src/controller/ResultadoController.php",
            data: data,
            success: function (response) {
                console.log("Dados enviados com sucesso!");
                console.log(response);
                // window.open(url);
                const btnNext = document.getElementById('next');
                btnNext.click();

            },
            error: function (error) {
                console.error("Erro ao enviar dados:", error);
            }
        });
    }
});

$("#sendWhatsapp").on("click", function () {
    window.open(urlWhatsapp);

})
