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
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

        $fonte = '../util/Roboto-Regular.ttf';

        mb_internal_encoding("UTF-8");

        $imagem = imagecreatetruecolor(400, 700);

        $corFundo = imagecolorallocate($imagem, 255, 255, 255);

        imagefill($imagem, 0, 0, $corFundo);


        $corQuadrado = imagecolorallocate($imagem, 255, 240, 240);

        imagefilledrectangle($imagem, 390, 210, 10, 280, $corQuadrado);
        imagefilledrectangle($imagem, 390, 310, 10, 380, $corQuadrado);
        imagefilledrectangle($imagem, 390, 410, 10, 480, $corQuadrado);


        $corTexto = imagecolorallocate($imagem, 0, 0, 0);
        $corTitulo = imagecolorallocate($imagem, 255, 20, 31);

        $logotipo = imagecreatefrompng('../util/img/mobile_background.png');

        $larguraImagem = 400;

        $larguraLogotipo = imagesx($logotipo);
        $alturaLogotipo = imagesy($logotipo);

        $posicaoX = ($larguraImagem - $larguraLogotipo) / 2;

        imagecopy($imagem, $logotipo, $posicaoX, 10, 0, 0, $larguraLogotipo, $alturaLogotipo);

        $titulo = "Teste rápido de visão";
        imagettftext($imagem, 18, 0, 100, 80, $corTitulo, $fonte, $titulo);
        imagettftext($imagem, 12, 0, 10, 130, $corTexto, $fonte, $resultado->getDataTeste());
        imagettftext($imagem, 12, 0, 100, 130, $corTexto, $fonte, $resultado->getHoraTeste());
        imagettftext($imagem, 12, 0, 12, 160, $corTexto, $fonte, $resultado->getNome());
        imagettftext($imagem, 12, 0, 10, 200, $corTexto, $fonte, $resultado->getIdade() . " Anos");
        imagettftext($imagem, 12, 0, 200, 200, $corTexto, $fonte, "Direito");
        imagettftext($imagem, 12, 0, 300, 200, $corTexto, $fonte, "Esquerdo");
        imagettftext($imagem, 12, 0, 15, 250, $corTexto, $fonte, "Teste de acuidade");
        imagettftext($imagem, 12, 0, 200, 250, $corTexto, $fonte, $resultado->getTesteAcuidadeDireito());
        imagettftext($imagem, 12, 0, 300, 250, $corTexto, $fonte, $resultado->getTesteAcuidadeEsquerdo());
        imagettftext($imagem, 12, 0, 15, 350, $corTexto, $fonte, "Teste de astigmatismo");
        imagettftext($imagem, 12, 0, 200, 350, $corTexto, $fonte, $resultado->getTesteAstigmatismoDireito());
        imagettftext($imagem, 12, 0, 300, 350, $corTexto, $fonte, $resultado->getTesteAstigmatismoEsquerdo());
        imagettftext($imagem, 12, 0, 15, 450, $corTexto, $fonte, "Teste de contraste");
        imagettftext($imagem, 12, 0, 200, 450, $corTexto, $fonte, $resultado->getTesteContrasteDireito());
        imagettftext($imagem, 12, 0, 300, 450, $corTexto, $fonte, $resultado->getTesteContrasteEsquerdo());
        if ($resultado->getResultadoGeral() === "RUIM"){
            imagettftext($imagem, 12, 0, 110, 540, $corTexto, $fonte, "Consulte um especialista");
            imagettftext($imagem, 28, 0, 110, 590, $corTitulo, $fonte, "URGENTE");
        }else{
            imagettftext($imagem, 12, 0, 140, 540, $corTexto, $fonte, "Sua visão esta");
            imagettftext($imagem, 28, 0, 100, 640, $corTitulo, $fonte, $resultado->getResultadoGeral());
        }
        imagettftext($imagem, 9, 0, 115, 690, $corTexto, $fonte, "By: Incub development!");

        header('Content-Type: image/png');
        $caminhoSalvar = '../util/r/' . $resultado->getWhatsapp() . '.png';
        imagepng($imagem, $caminhoSalvar,9);

        imagedestroy($imagem);
        imagedestroy($logotipo);
    }
}
$connection = Connection::getConnection();
$resultadoController = new ResultadoController($connection);
$resultadoController->salvarCliente();

