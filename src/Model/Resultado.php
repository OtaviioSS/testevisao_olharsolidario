<?php
namespace src\Model;


class Resultado {
    public string $nome;
    public int $idade;
    public string $data_teste;
    public string $hora_teste;
    public string $teste_acuidade_direito;
    public string $teste_astigmatismo_direito;
    public string $teste_contraste_direito;
    public string $teste_acuidade_esquerdo;
    public string $teste_astigmatismo_esquerdo;
    public string $teste_contraste_esquerdo;
    public string $resultado_geral;
    public string $codigo_promocao;
    
    public string $whatsapp;

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getIdade(): int
    {
        return $this->idade;
    }

    /**
     * @param int $idade
     */
    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    /**
     * @return string
     */
    public function getDataTeste(): string
    {
        return $this->data_teste;
    }

    /**
     * @param string $data_teste
     */
    public function setDataTeste(string $data_teste): void
    {
        $this->data_teste = $data_teste;
    }

    /**
     * @return string
     */
    public function getHoraTeste(): string
    {
        return $this->hora_teste;
    }

    /**
     * @param string $hora_teste
     */
    public function setHoraTeste(string $hora_teste): void
    {
        $this->hora_teste = $hora_teste;
    }

    /**
     * @return string
     */
    public function getTesteAcuidadeDireito(): string
    {
        return $this->teste_acuidade_direito;
    }

    /**
     * @param string $teste_acuidade_direito
     */
    public function setTesteAcuidadeDireito(string $teste_acuidade_direito): void
    {
        $this->teste_acuidade_direito = $teste_acuidade_direito;
    }

    /**
     * @return string
     */
    public function getTesteAstigmatismoDireito(): string
    {
        return $this->teste_astigmatismo_direito;
    }

    /**
     * @param string $teste_astigmatismo_direito
     */
    public function setTesteAstigmatismoDireito(string $teste_astigmatismo_direito): void
    {
        $this->teste_astigmatismo_direito = $teste_astigmatismo_direito;
    }

    /**
     * @return string
     */
    public function getTesteContrasteDireito(): string
    {
        return $this->teste_contraste_direito;
    }

    /**
     * @param string $teste_contraste_direito
     */
    public function setTesteContrasteDireito(string $teste_contraste_direito): void
    {
        $this->teste_contraste_direito = $teste_contraste_direito;
    }

    /**
     * @return string
     */
    public function getTesteAcuidadeEsquerdo(): string
    {
        return $this->teste_acuidade_esquerdo;
    }

    /**
     * @param string $teste_acuidade_esquerdo
     */
    public function setTesteAcuidadeEsquerdo(string $teste_acuidade_esquerdo): void
    {
        $this->teste_acuidade_esquerdo = $teste_acuidade_esquerdo;
    }

    /**
     * @return string
     */
    public function getTesteAstigmatismoEsquerdo(): string
    {
        return $this->teste_astigmatismo_esquerdo;
    }

    /**
     * @param string $teste_astigmatismo_esquerdo
     */
    public function setTesteAstigmatismoEsquerdo(string $teste_astigmatismo_esquerdo): void
    {
        $this->teste_astigmatismo_esquerdo = $teste_astigmatismo_esquerdo;
    }

    /**
     * @return string
     */
    public function getTesteContrasteEsquerdo(): string
    {
        return $this->teste_contraste_esquerdo;
    }

    /**
     * @param string $teste_contraste_esquerdo
     */
    public function setTesteContrasteEsquerdo(string $teste_contraste_esquerdo): void
    {
        $this->teste_contraste_esquerdo = $teste_contraste_esquerdo;
    }

    /**
     * @return string
     */
    public function getResultadoGeral(): string
    {
        return $this->resultado_geral;
    }

    /**
     * @param string $resultado_geral
     */
    public function setResultadoGeral(string $resultado_geral): void
    {
        $this->resultado_geral = $resultado_geral;
    }

    /**
     * @return string
     */
    public function getCodigoPromocao(): string
    {
        return $this->codigo_promocao;
    }

    /**
     * @param string $codigo_promocao
     */
    public function setCodigoPromocao(string $codigo_promocao): void
    {
        $this->codigo_promocao = $codigo_promocao;
    }

    /**
     * @return string
     */
    public function getWhatsapp(): string
    {
        return $this->whatsapp;
    }

    /**
     * @param string $whatsapp
     */
    public function setWhatsapp(string $whatsapp): void
    {
        $this->whatsapp = $whatsapp;
    }



    
    
  



}
