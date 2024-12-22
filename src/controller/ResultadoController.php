<?php

namespace src\controller;

require __DIR__ . '/../../vendor/autoload.php';

use Exception;
use src\config\Connection;
use src\Model\Resultado;
use src\repository\ResultadoRepository;

class ResultadoController extends ResultadoRepository
{
    public function salvarCliente()
    {
        try {
            $resultado = new Resultado();
            $resultado->setNome(trim($_POST['nome']));
            $resultado->setIdade(trim($_POST['idade']));
            $resultado->setDataTeste(trim($_POST['dataTeste']));
            $resultado->setHoraTeste(trim($_POST['horaTeste']));
            $resultado->setTesteAcuidadeDireito(trim($_POST['resultadoTesteMiopiaOlhoDireito']));
            $resultado->setTesteAstigmatismoDireito(trim($_POST['resultadoTesteAstigmatismoOlhoDireito']));
            $resultado->setTesteContrasteDireito(trim($_POST['resultadoTesteContrasteOlhoDireito']));
            $resultado->setTesteAcuidadeEsquerdo(trim($_POST['resultadoTesteMiopiaOlhoEsquerdo']));
            $resultado->setTesteAstigmatismoEsquerdo(trim($_POST['resultadoTesteAstigmatismoOlhoEsquerdo']));
            $resultado->setTesteContrasteEsquerdo(trim($_POST['resultadoTesteContrasteOlhoEsquerdo']));
            $resultado->setResultadoGeral(trim($_POST['resultadoGeral']));
            $resultado->setCodigoPromocao(trim($_POST['idade']));
            $resultado->setWhatsapp(trim($_POST['whatsapp']));
            $this->inserir($resultado);
            $this->gerarImagem($resultado);
            $response = array('success' => true, 'message' => 'Dados salvos com sucesso!');
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($response);
            /*          return [
                          'codigo' => $unidadesFuncionais->setNome(),
                          'tipo' => $unidadesFuncionais->setTipo(),
                          'nome' => $unidadesFuncionais->setNome()
                      ];*/

        } catch (Exception $exception) {
            $response = array('success' => false, 'message' => 'Erro ao salvar dados: ' . $exception->getMessage());
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode($response);
        }

    }

    public function gerarImagem(Resultado $resultado)
    {
        // Headers para evitar cache
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        // Caminho para a fonte TrueType
        $fonte = '../util/Roboto-Regular.ttf';

        // Configuração de codificação UTF-8
        mb_internal_encoding("UTF-8");

        // Criação da imagem com fundo branco
        $imagem = imagecreatetruecolor(400, 700);
        $corFundo = imagecolorallocate($imagem, 255, 255, 255); // Branco
        imagefill($imagem, 0, 0, $corFundo);

        // Cores utilizadas
        $corTexto = imagecolorallocate($imagem, 50, 50, 50); // Cinza escuro
        $corTitulo = imagecolorallocate($imagem, 220, 0, 100); // Rosa escuro
        $corRuim = imagecolorallocate($imagem, 255, 0, 0); // Vermelho
        $corOtimo = imagecolorallocate($imagem, 0, 200, 0); // Verde

        // Adicionando o ícone superior
        $icone = imagecreatefrompng('../util/img/icone.png'); // Ícone em PNG
        $larguraIcone = imagesx($icone);
        $alturaIcone = imagesy($icone);
        $posicaoXIcone = (400 - $larguraIcone) / 2;
        imagecopy($imagem, $icone, $posicaoXIcone, 20, 0, 0, $larguraIcone, $alturaIcone);
        imagedestroy($icone); // Libera memória

        // Título principal
        $titulo = "Teste rápido de visão";
        imagettftext($imagem, 18, 0, 70, 120, $corTitulo, $fonte, $titulo);

        // Dados do teste
        $dataHoraTeste = $resultado->getDataTeste() . " " . $resultado->getHoraTeste();
        imagettftext($imagem, 12, 0, 120, 150, $corTexto, $fonte, $dataHoraTeste);

        // Nome e idade
        $nome = $resultado->getNome();
        imagettftext($imagem, 12, 0, 120, 180, $corTexto, $fonte, $nome);

        $idade = $resultado->getIdade() . " anos";
        imagettftext($imagem, 12, 0, 120, 210, $corTexto, $fonte, $idade);

        // Cabeçalhos da tabela
        imagettftext($imagem, 12, 0, 200, 250, $corTexto, $fonte, "Direito");
        imagettftext($imagem, 12, 0, 300, 250, $corTexto, $fonte, "Esquerdo");

        // Dados da tabela
        $linhas = [
            ["Teste de acuidade", $resultado->getTesteAcuidadeDireito(), $resultado->getTesteAcuidadeEsquerdo()],
            ["Teste de astigmatismo", $resultado->getTesteAstigmatismoDireito(), $resultado->getTesteAstigmatismoEsquerdo()],
            ["Teste de contraste", $resultado->getTesteContrasteDireito(), $resultado->getTesteContrasteEsquerdo()]
        ];

        $posicaoY = 300;
        foreach ($linhas as $linha) {
            imagettftext($imagem, 12, 0, 20, $posicaoY, $corTexto, $fonte, $linha[0]);
            imagettftext(
                $imagem,
                12,
                0,
                200,
                $posicaoY,
                $linha[1] === "RUIM" ? $corRuim : $corOtimo,
                $fonte,
                $linha[1]
            );
            imagettftext(
                $imagem,
                12,
                0,
                300,
                $posicaoY,
                $linha[2] === "RUIM" ? $corRuim : $corOtimo,
                $fonte,
                $linha[2]
            );
            $posicaoY += 50;
        }

        // Mensagem final
        if ($resultado->getResultadoGeral() === "RUIM") {
            imagettftext($imagem, 14, 0, 60, 600, $corTexto, $fonte, "Consulte um especialista");
            imagettftext($imagem, 24, 0, 120, 650, $corRuim, $fonte, "URGENTE");
        } else {
            imagettftext($imagem, 14, 0, 140, 600, $corTexto, $fonte, "Sua visão está");
            imagettftext($imagem, 24, 0, 100, 650, $corTitulo, $fonte, $resultado->getResultadoGeral());
        }

        // Rodapé
        imagettftext($imagem, 9, 0, 115, 690, $corTexto, $fonte, "By: Incub development!");

        // Salva a imagem
        header('Content-Type: image/png');
        $caminhoSalvar = '../util/r/' . $resultado->getWhatsapp() . '.png';
        imagepng($imagem, $caminhoSalvar, 9);

        // Libera memória
        imagedestroy($imagem);
    }

}
$connection = Connection::getConnection();
$resultadoController = new ResultadoController($connection);
$resultadoController->salvarCliente();

