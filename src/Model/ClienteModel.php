<?php

namespace src\Model;

use DateTime;

class ClienteModel
{
    private string $nome;
    private int $idade;
    private string $whatsapp;
    private DateTime $dataTeste;
    private string $horaTeste;
    private float $testeAcuidadeDireito;
    private float $testeAstigmatismoDireito;
    private float $testeContrasteDireito;
    private float $testeAcuidadeEsquerdo;
    private float $testeAstigmatismoEsquerdo;
    private float $testeContrasteEsquerdo;
    private string $resultadoGeral;
    private string $codigoPromocao;
    private float $acuidadeOlhoDireito;
    private float $acuidadeOlhoEsquerdo;
    private float $astigmatismoOlhoDireito;
    private float $astigmatismoOlhoEsquerdo;
    private float $contrasteOlhoDireito;
    private float $contrasteOlhoEsquerdo;
    private DateTime $creationDate;
    private DateTime $lastUpdateDate;

    /**
     * Construtor
     */
    public function __construct(
        string $nome,
        int $idade,
        string $whatsapp,
        DateTime $dataTeste,
        string $horaTeste,
        float $testeAcuidadeDireito,
        float $testeAstigmatismoDireito,
        float $testeContrasteDireito,
        float $testeAcuidadeEsquerdo,
        float $testeAstigmatismoEsquerdo,
        float $testeContrasteEsquerdo,
        string $resultadoGeral,
        string $codigoPromocao,
        float $acuidadeOlhoDireito,
        float $acuidadeOlhoEsquerdo,
        float $astigmatismoOlhoDireito,
        float $astigmatismoOlhoEsquerdo,
        float $contrasteOlhoDireito,
        float $contrasteOlhoEsquerdo,
        DateTime $creationDate,
        DateTime $lastUpdateDate
    ) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->whatsapp = $whatsapp;
        $this->dataTeste = $dataTeste;
        $this->horaTeste = $horaTeste;
        $this->testeAcuidadeDireito = $testeAcuidadeDireito;
        $this->testeAstigmatismoDireito = $testeAstigmatismoDireito;
        $this->testeContrasteDireito = $testeContrasteDireito;
        $this->testeAcuidadeEsquerdo = $testeAcuidadeEsquerdo;
        $this->testeAstigmatismoEsquerdo = $testeAstigmatismoEsquerdo;
        $this->testeContrasteEsquerdo = $testeContrasteEsquerdo;
        $this->resultadoGeral = $resultadoGeral;
        $this->codigoPromocao = $codigoPromocao;
        $this->acuidadeOlhoDireito = $acuidadeOlhoDireito;
        $this->acuidadeOlhoEsquerdo = $acuidadeOlhoEsquerdo;
        $this->astigmatismoOlhoDireito = $astigmatismoOlhoDireito;
        $this->astigmatismoOlhoEsquerdo = $astigmatismoOlhoEsquerdo;
        $this->contrasteOlhoDireito = $contrasteOlhoDireito;
        $this->contrasteOlhoEsquerdo = $contrasteOlhoEsquerdo;
        $this->creationDate = $creationDate;
        $this->lastUpdateDate = $lastUpdateDate;
    }

    // Getters e Setters para cada propriedade

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    public function getWhatsapp(): string
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(string $whatsapp): void
    {
        $this->whatsapp = $whatsapp;
    }

    public function getDataTeste(): DateTime
    {
        return $this->dataTeste;
    }

    public function setDataTeste(DateTime $dataTeste): void
    {
        $this->dataTeste = $dataTeste;
    }

    public function getHoraTeste(): string
    {
        return $this->horaTeste;
    }

    public function setHoraTeste(string $horaTeste): void
    {
        $this->horaTeste = $horaTeste;
    }

    public function getTesteAcuidadeDireito(): float
    {
        return $this->testeAcuidadeDireito;
    }

    public function setTesteAcuidadeDireito(float $testeAcuidadeDireito): void
    {
        $this->testeAcuidadeDireito = $testeAcuidadeDireito;
    }

    public function getTesteAstigmatismoDireito(): float
    {
        return $this->testeAstigmatismoDireito;
    }

    public function setTesteAstigmatismoDireito(float $testeAstigmatismoDireito): void
    {
        $this->testeAstigmatismoDireito = $testeAstigmatismoDireito;
    }

    public function getTesteContrasteDireito(): float
    {
        return $this->testeContrasteDireito;
    }

    public function setTesteContrasteDireito(float $testeContrasteDireito): void
    {
        $this->testeContrasteDireito = $testeContrasteDireito;
    }

    public function getTesteAcuidadeEsquerdo(): float
    {
        return $this->testeAcuidadeEsquerdo;
    }

    public function setTesteAcuidadeEsquerdo(float $testeAcuidadeEsquerdo): void
    {
        $this->testeAcuidadeEsquerdo = $testeAcuidadeEsquerdo;
    }

    public function getTesteAstigmatismoEsquerdo(): float
    {
        return $this->testeAstigmatismoEsquerdo;
    }

    public function setTesteAstigmatismoEsquerdo(float $testeAstigmatismoEsquerdo): void
    {
        $this->testeAstigmatismoEsquerdo = $testeAstigmatismoEsquerdo;
    }

    public function getTesteContrasteEsquerdo(): float
    {
        return $this->testeContrasteEsquerdo;
    }

    public function setTesteContrasteEsquerdo(float $testeContrasteEsquerdo): void
    {
        $this->testeContrasteEsquerdo = $testeContrasteEsquerdo;
    }

    public function getResultadoGeral(): string
    {
        return $this->resultadoGeral;
    }

    public function setResultadoGeral(string $resultadoGeral): void
    {
        $this->resultadoGeral = $resultadoGeral;
    }

    public function getCodigoPromocao(): string
    {
        return $this->codigoPromocao;
    }

    public function setCodigoPromocao(string $codigoPromocao): void
    {
        $this->codigoPromocao = $codigoPromocao;
    }

    public function getAcuidadeOlhoDireito(): float
    {
        return $this->acuidadeOlhoDireito;
    }

    public function setAcuidadeOlhoDireito(float $acuidadeOlhoDireito): void
    {
        $this->acuidadeOlhoDireito = $acuidadeOlhoDireito;
    }

    public function getAcuidadeOlhoEsquerdo(): float
    {
        return $this->acuidadeOlhoEsquerdo;
    }

    public function setAcuidadeOlhoEsquerdo(float $acuidadeOlhoEsquerdo): void
    {
        $this->acuidadeOlhoEsquerdo = $acuidadeOlhoEsquerdo;
    }

    public function getAstigmatismoOlhoDireito(): float
    {
        return $this->astigmatismoOlhoDireito;
    }

    public function setAstigmatismoOlhoDireito(float $astigmatismoOlhoDireito): void
    {
        $this->astigmatismoOlhoDireito = $astigmatismoOlhoDireito;
    }

    public function getAstigmatismoOlhoEsquerdo(): float
    {
        return $this->astigmatismoOlhoEsquerdo;
    }

    public function setAstigmatismoOlhoEsquerdo(float $astigmatismoOlhoEsquerdo): void
    {
        $this->astigmatismoOlhoEsquerdo = $astigmatismoOlhoEsquerdo;
    }

    public function getContrasteOlhoDireito(): float
    {
        return $this->contrasteOlhoDireito;
    }

    public function setContrasteOlhoDireito(float $contrasteOlhoDireito): void
    {
        $this->contrasteOlhoDireito = $contrasteOlhoDireito;
    }

    public function getContrasteOlhoEsquerdo(): float
    {
        return $this->contrasteOlhoEsquerdo;
    }

    public function setContrasteOlhoEsquerdo(float $contrasteOlhoEsquerdo): void
    {
        $this->contrasteOlhoEsquerdo = $contrasteOlhoEsquerdo;
    }

    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    public function getLastUpdateDate(): DateTime
    {
        return $this->lastUpdateDate;
    }

    public function setLastUpdateDate(DateTime $lastUpdateDate): void
    {
        $this->lastUpdateDate = $lastUpdateDate;
    }
}
