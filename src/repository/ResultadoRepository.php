<?php
namespace src\repository;
require __DIR__ .'/../../vendor/autoload.php';

use PDO;
use src\config\Connection;
use Exception;
use src\Model\Resultado;

class ResultadoRepository
{


    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    protected function inserir(Resultado $resultado)
    {
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare("INSERT INTO clientes
	(nome, idade, data_teste, hora_teste, teste_acuidade_direito, teste_astigmatismo_direito, teste_contraste_direito, teste_acuidade_esquerdo, teste_astigmatismo_esquerdo, teste_contraste_esquerdo, resultado_geral, codigo_promocao,whatsapp)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
            $stmt->bindValue(1, $resultado->getNome());
            $stmt->bindValue(2, $resultado->getIdade());
            $stmt->bindValue(3, $resultado->getDataTeste());
            $stmt->bindValue(4, $resultado->getHoraTeste());
            $stmt->bindValue(5, $resultado->getTesteAcuidadeDireito());
            $stmt->bindValue(6, $resultado->getTesteAstigmatismoDireito());
            $stmt->bindValue(7, $resultado->getTesteContrasteDireito());
            $stmt->bindValue(8, $resultado->getTesteAcuidadeEsquerdo());
            $stmt->bindValue(9, $resultado->getTesteAstigmatismoEsquerdo());
            $stmt->bindValue(10, $resultado->getTesteContrasteEsquerdo());
            $stmt->bindValue(11, $resultado->getResultadoGeral());
            $stmt->bindValue(12, $resultado->getCodigoPromocao());
            $stmt->bindValue(13, $resultado->getWhatsapp());
            $stmt->execute();
            $id = $this->connection->lastInsertId();
            $this->connection->commit();
            return $id;
        } catch (Exception $exception) {
            echo $exception;
            return $exception;
        }
    }

}