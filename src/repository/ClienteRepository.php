<?php

namespace src\repository;

use src\Model\ClienteModel;
use PDO;


class ClienteRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Salva um cliente no banco de dados.
     */
    public function save(ClienteModel $cliente): bool
    {
        $query = "INSERT INTO clientes (
                    nome, idade, data_teste, hora_teste, teste_acuidade_direito, teste_astigmatismo_direito, 
                    teste_contraste_direito, teste_acuidade_esquerdo, teste_astigmatismo_esquerdo, 
                    teste_contraste_esquerdo, resultado_geral, codigo_promocao, whatsapp, 
                    acuidade_olho_direito, acuidade_olho_esquerdo, astigmatismo_olho_direito, 
                    astigmatismo_olho_esquerdo, contraste_olho_direito, contraste_olho_esquerdo, 
                    creation_date, last_update_date
                  ) VALUES (
                    :nome, :idade, :dataTeste, :horaTeste, :testeAcuidadeDireito, :testeAstigmatismoDireito, 
                    :testeContrasteDireito, :testeAcuidadeEsquerdo, :testeAstigmatismoEsquerdo, 
                    :testeContrasteEsquerdo, :resultadoGeral, :codigoPromocao, :whatsapp, 
                    :acuidadeOlhoDireito, :acuidadeOlhoEsquerdo, :astigmatismoOlhoDireito, 
                    :astigmatismoOlhoEsquerdo, :contrasteOlhoDireito, :contrasteOlhoEsquerdo, 
                    NOW(), NOW()
                  )";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':idade', $cliente->getIdade(), PDO::PARAM_INT);
        $stmt->bindValue(':dataTeste', $cliente->getDataTeste()->format('Y-m-d'));
        $stmt->bindValue(':horaTeste', $cliente->getHoraTeste());
        $stmt->bindValue(':testeAcuidadeDireito', $cliente->getTesteAcuidadeDireito());
        $stmt->bindValue(':testeAstigmatismoDireito', $cliente->getTesteAstigmatismoDireito());
        $stmt->bindValue(':testeContrasteDireito', $cliente->getTesteContrasteDireito());
        $stmt->bindValue(':testeAcuidadeEsquerdo', $cliente->getTesteAcuidadeEsquerdo());
        $stmt->bindValue(':testeAstigmatismoEsquerdo', $cliente->getTesteAstigmatismoEsquerdo());
        $stmt->bindValue(':testeContrasteEsquerdo', $cliente->getTesteContrasteEsquerdo());
        $stmt->bindValue(':resultadoGeral', $cliente->getResultadoGeral());
        $stmt->bindValue(':codigoPromocao', $cliente->getCodigoPromocao());
        $stmt->bindValue(':whatsapp', $cliente->getWhatsapp());
        $stmt->bindValue(':acuidadeOlhoDireito', $cliente->getAcuidadeOlhoDireito());
        $stmt->bindValue(':acuidadeOlhoEsquerdo', $cliente->getAcuidadeOlhoEsquerdo());
        $stmt->bindValue(':astigmatismoOlhoDireito', $cliente->getAstigmatismoOlhoDireito());
        $stmt->bindValue(':astigmatismoOlhoEsquerdo', $cliente->getAstigmatismoOlhoEsquerdo());
        $stmt->bindValue(':contrasteOlhoDireito', $cliente->getContrasteOlhoDireito());
        $stmt->bindValue(':contrasteOlhoEsquerdo', $cliente->getContrasteOlhoEsquerdo());

        return $stmt->execute();
    }

    /**
     * Busca todos os clientes do banco de dados.
     */
    public function findAll(): array
    {
        $query = "SELECT * FROM clientes";
        $stmt = $this->connection->query($query);

        $clientes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clientes[] = $this->hydrateCliente($row);
        }

        return $clientes;
    }

    /**
     * Busca um cliente pelo ID.
     */
    public function findById(int $id): ?ClienteModel
    {
        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->hydrateCliente($row) : null;
    }

    /**
     * Atualiza os dados de um cliente.
     */
    public function update(ClienteModel $cliente, int $id): bool
    {
        $query = "UPDATE clientes SET
                    nome = :nome, idade = :idade, data_teste = :dataTeste, hora_teste = :horaTeste, 
                    teste_acuidade_direito = :testeAcuidadeDireito, teste_astigmatismo_direito = :testeAstigmatismoDireito, 
                    teste_contraste_direito = :testeContrasteDireito, teste_acuidade_esquerdo = :testeAcuidadeEsquerdo, 
                    teste_astigmatismo_esquerdo = :testeAstigmatismoEsquerdo, teste_contraste_esquerdo = :testeContrasteEsquerdo, 
                    resultado_geral = :resultadoGeral, codigo_promocao = :codigoPromocao, whatsapp = :whatsapp, 
                    acuidade_olho_direito = :acuidadeOlhoDireito, acuidade_olho_esquerdo = :acuidadeOlhoEsquerdo, 
                    astigmatismo_olho_direito = :astigmatismoOlhoDireito, astigmatismo_olho_esquerdo = :astigmatismoOlhoEsquerdo, 
                    contraste_olho_direito = :contrasteOlhoDireito, contraste_olho_esquerdo = :contrasteOlhoEsquerdo, 
                    last_update_date = NOW()
                  WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':idade', $cliente->getIdade(), PDO::PARAM_INT);
        $stmt->bindValue(':dataTeste', $cliente->getDataTeste()->format('Y-m-d'));
        $stmt->bindValue(':horaTeste', $cliente->getHoraTeste());
        $stmt->bindValue(':testeAcuidadeDireito', $cliente->getTesteAcuidadeDireito());
        $stmt->bindValue(':testeAstigmatismoDireito', $cliente->getTesteAstigmatismoDireito());
        $stmt->bindValue(':testeContrasteDireito', $cliente->getTesteContrasteDireito());
        $stmt->bindValue(':testeAcuidadeEsquerdo', $cliente->getTesteAcuidadeEsquerdo());
        $stmt->bindValue(':testeAstigmatismoEsquerdo', $cliente->getTesteAstigmatismoEsquerdo());
        $stmt->bindValue(':testeContrasteEsquerdo', $cliente->getTesteContrasteEsquerdo());
        $stmt->bindValue(':resultadoGeral', $cliente->getResultadoGeral());
        $stmt->bindValue(':codigoPromocao', $cliente->getCodigoPromocao());
        $stmt->bindValue(':whatsapp', $cliente->getWhatsapp());
        $stmt->bindValue(':acuidadeOlhoDireito', $cliente->getAcuidadeOlhoDireito());
        $stmt->bindValue(':acuidadeOlhoEsquerdo', $cliente->getAcuidadeOlhoEsquerdo());
        $stmt->bindValue(':astigmatismoOlhoDireito', $cliente->getAstigmatismoOlhoDireito());
        $stmt->bindValue(':astigmatismoOlhoEsquerdo', $cliente->getAstigmatismoOlhoEsquerdo());
        $stmt->bindValue(':contrasteOlhoDireito', $cliente->getContrasteOlhoDireito());
        $stmt->bindValue(':contrasteOlhoEsquerdo', $cliente->getContrasteOlhoEsquerdo());
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Converte um array de dados para um objeto ClienteModel.
     */
    private function hydrateCliente(array $data): ClienteModel
    {
        return new ClienteModel(
            $data['nome'],
            $data['idade'],
            $data['whatsapp'],
            new \DateTime($data['data_teste']),
            $data['hora_teste'],
            (float)$data['teste_acuidade_direito'],
            (float)$data['teste_astigmatismo_direito'],
            (float)$data['teste_contraste_direito'],
            (float)$data['teste_acuidade_esquerdo'],
            (float)$data['teste_astigmatismo_esquerdo'],
            (float)$data['teste_contraste_esquerdo'],
            $data['resultado_geral'],
            $data['codigo_promocao'],
            (float)$data['acuidade_olho_direito'],
            (float)$data['acuidade_olho_esquerdo'],
            (float)$data['astigmatismo_olho_direito'],
            (float)$data['astigmatismo_olho_esquerdo'],
            (float)$data['contraste_olho_direito'],
            (float)$data['contraste_olho_esquerdo']
        );
    }
}

