<?php

namespace Classes;

class CalculadoraData
{

    private $dataInicial;
    private $dataFinal;

    public function __construct($dataInicial, $dataFinal)
    {
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
    }

    //função para verificar se o ano é bissexto
    private function verificaBissexto($ano): bool
    {
        return (($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0));
    }

    //gera o modelo de dias com base se o ano é bissexto ou não
    private function geraModeloDias($bissexto): array
    {
        return [
            1 => 31,
            2 => $bissexto ? 29 : 28,
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10 => 31,
            11 => 30,
            12 => 31
        ];
    }

    //gera os dias do ano com base se ele é bissexto ou não
    private function geraDiasBissexto($bissexto): int
    {
        return $bissexto ? 366 : 365;
    }

    public function calculaDias(): int
    {
        list($anoInicial, $mesInicial, $diaInicial) = array_map('intval', explode("-", $this->dataInicial)); //variaveis da data inicial (em inteiros)
        list($anoFinal, $mesFinal, $diaFinal) = array_map('intval', explode("-", $this->dataFinal)); //variaveis da data final (em inteiros)

        $diferencaAnos = $anoFinal - $anoInicial;

        $modeloDiasAno = $this->geraModeloDias($this->verificaBissexto($anoInicial)); //gera o modelo de dias com base no ano inicial

        if ($diferencaAnos > 0) { //verifica se as datas iniciais e finais são de anos diferentes

            /**
             * CASO AS DATAS FOREM DE ANOS DIFERENTES
             */

            $diasTotais = $this->geraModeloDias($this->verificaBissexto($anoInicial))[$mesInicial] - $diaInicial; //calcula os dias restantes do primeiro mes

            for ($i = $mesInicial + 1; $i <= 12; $i++) { //loop que percorre os meses até o fim do ano inicial
                $diasTotais += $modeloDiasAno[$i]; //resulta na quantidade de dias do ano inicial
            }

            for ($j = 1; $j < $diferencaAnos; $j++) { //loop que percorre os anos entre as duas datas e calcula seus dias
                $anoInicial++;
                $diasAnoAtual = $this->geraDiasBissexto($this->verificaBissexto($anoInicial));
                $diasTotais += $diasAnoAtual;
            }

            $modeloDiasAnoFinal = $this->geraModeloDias($this->verificaBissexto($anoFinal)); //gera o modelo dos dias do ultimo ano

            for ($i = 1; $i < $mesFinal; $i++) { //lopp que percorre os meses do ultimo ano
                $diasTotais += $modeloDiasAnoFinal[$i]; //soma dos dias do ultimo ano
            }
        } else {

            /**
             * CASO AS DATAS FOREM DE ANOS IGUAIS
             */

            if ($mesInicial === $mesFinal) { // verifica se são do mesmo mes
                return $diaFinal - $diaInicial; // subtrai os dias
            }

            $diasTotais = $modeloDiasAno[$mesInicial] - $diaInicial; // calcula os dias do primeiro mes

            for ($k = $mesInicial + 1; $k < $mesFinal; $k++) { // loop que percorre os meses no intervalo entre o inicial e o final
                $diasTotais += $modeloDiasAno[$k]; // soma os dias com base no modelo
            }
        }

        $diasTotais += $diaFinal; // soma dos ultimos dias, do ultimo mês, do último ano

        return $diasTotais;
    }
}
