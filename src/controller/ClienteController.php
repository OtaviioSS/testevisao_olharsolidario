<?php

namespace src\controller;

use src\Model\ClienteModel;
use src\Repository\ClienteRepository;
use PDO;
use DateTime;

class ClienteController
{
    private ClienteRepository $clienteRepository;

    public function __construct(PDO $connection)
    {
        $this->clienteRepository = new ClienteRepository($connection);
    }

    /**
     * Lista todos os clientes.
     */
    public function listAll(): array
    {
        try {
            $clientes = $this->clienteRepository->findAll();
            header('Content-Type: application/json');
            echo json_encode($clientes);
            return $clientes;
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao listar os clientes: ' . $e->getMessage()]);
            return [];
        }
    }

    /**
     * Busca um cliente pelo ID.
     */
    public function findById(int $id): void
    {
        try {
            $cliente = $this->clienteRepository->findById($id);
            if ($cliente) {
                header('Content-Type: application/json');
                echo json_encode($cliente);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Cliente não encontrado.']);
            }
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao buscar o cliente: ' . $e->getMessage()]);
        }
    }

    /**
     * Cria um novo cliente.
     */
    public function create(array $data): void
    {
        try {
            $cliente = new ClienteModel(
                $data['nome'],
                (int)$data['idade'],
                $data['whatsapp'],
                new DateTime($data['data_teste']),
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
                (float)$data['contraste_olho_esquerdo'],
                new DateTime(),
                new DateTime()
            );

            $this->clienteRepository->save($cliente);
            http_response_code(201);
            echo json_encode(['message' => 'Cliente criado com sucesso.']);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar o cliente: ' . $e->getMessage()]);
        }
    }

    /**
     * Atualiza os dados de um cliente.
     */
    public function update(int $id, array $data): void
    {
        try {
            $cliente = $this->clienteRepository->findById($id);
            if (!$cliente) {
                http_response_code(404);
                echo json_encode(['error' => 'Cliente não encontrado.']);
                return;
            }

            $cliente->setNome($data['nome']);
            $cliente->setIdade((int)$data['idade']);
            $cliente->setWhatsapp($data['whatsapp']);
            $cliente->setDataTeste(new DateTime($data['data_teste']));
            $cliente->setHoraTeste($data['hora_teste']);
            $cliente->setTesteAcuidadeDireito((float)$data['teste_acuidade_direito']);
            $cliente->setTesteAstigmatismoDireito((float)$data['teste_astigmatismo_direito']);
            $cliente->setTesteContrasteDireito((float)$data['teste_contraste_direito']);
            $cliente->setTesteAcuidadeEsquerdo((float)$data['teste_acuidade_esquerdo']);
            $cliente->setTesteAstigmatismoEsquerdo((float)$data['teste_astigmatismo_esquerdo']);
            $cliente->setTesteContrasteEsquerdo((float)$data['teste_contraste_esquerdo']);
            $cliente->setResultadoGeral($data['resultado_geral']);
            $cliente->setCodigoPromocao($data['codigo_promocao']);
            $cliente->setAcuidadeOlhoDireito((float)$data['acuidade_olho_direito']);
            $cliente->setAcuidadeOlhoEsquerdo((float)$data['acuidade_olho_esquerdo']);
            $cliente->setAstigmatismoOlhoDireito((float)$data['astigmatismo_olho_direito']);
            $cliente->setAstigmatismoOlhoEsquerdo((float)$data['astigmatismo_olho_esquerdo']);
            $cliente->setContrasteOlhoDireito((float)$data['contraste_olho_direito']);
            $cliente->setContrasteOlhoEsquerdo((float)$data['contraste_olho_esquerdo']);

            $this->clienteRepository->update($cliente, $id);
            echo json_encode(['message' => 'Cliente atualizado com sucesso.']);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao atualizar o cliente: ' . $e->getMessage()]);
        }
    }

    /**
     * Exclui um cliente pelo ID.
     */
    public function delete(int $id): void
    {
        try {
            $cliente = $this->clienteRepository->findById($id);
            if (!$cliente) {
                http_response_code(404);
                echo json_encode(['error' => 'Cliente não encontrado.']);
                return;
            }

            $this->clienteRepository->delete($id);
            echo json_encode(['message' => 'Cliente excluído com sucesso.']);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao excluir o cliente: ' . $e->getMessage()]);
        }
    }
}
