<?php

/**
 * Calcula o numero de dias entre 2 datas.
 * As datas passadas sempre serao validas e a primeira data sempre sera menor que a segunda data.
 * @param string $dataInicial No formato YYYY-MM-DD
 * @param string $dataFinal No formato YYYY-MM-DD
 * @return int O numero de dias entre as datas
 **/

/**
 * verificar se o ano é bissexto
 * calcular o restante dos dias do primeiro mes e ano
 * calcular os dias do anos do intervalo entre as datas
 * calcular os dias do ultimo ano
 */

function verificaBissexto($ano)
{ //função para verificar se o ano é bissexto
	return (($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0));
}

function geraModeloDias($bissexto)
{ //gera o modelo de dias com base se o ano é bissexto ou não
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

function geraDiasBissexto($bissexto)
{ //gera os dias do ano com base se ele é bissexto ou não
	return $bissexto ? 366 : 365;
}

function calculaDias($dataInicial, $dataFinal)
{
	/*
		- Setembro, abril, junho e novembro tem 30 dias, todos os outros meses tem 31 exceto fevereiro que tem 28, exceto nos anos bissextos nos quais ele tem 29.
		- Os anos bissexto tem 366 dias e os demais 365.
		- Todo ano divisivel por 4 e um ano bissexto.
		- A regra acima não e valida para anos divisiveis por 100. Estes anos devem ser divisiveis por 400 para serem anos bissextos. Assim, o ano 1700, 1800, 1900 e 2100 nao sao bissextos, mas 2000 e bissexto.
		- Não e permitido o uso de classes e funcoes de data da linguagem (DateTime, mktime, strtotime, etc).
	*/

	list($anoInicial, $mesInicial, $diaInicial) = array_map('intval', explode("-", $dataInicial)); //variaveis da data inicial (em inteiros)
	list($anoFinal, $mesFinal, $diaFinal) = array_map('intval', explode("-", $dataFinal)); //variaveis da data final (em inteiros)

	$diferencaAnos = $anoFinal - $anoInicial;

	/**
	 * CASO AS DATAS FOREM DE ANOS DIFERENTES
	 */

	if ($diferencaAnos > 0) { //verifica se as datas iniciais e finais são de anos diferentes

		$diasTotais = geraModeloDias(verificaBissexto($anoInicial))[$mesInicial] - $diaInicial; //calcula os dias restantes do primeiro mes

		$modeloDiasAnoInicial = geraModeloDias(verificaBissexto($anoInicial)); //gera o modelo de dias com base no ano inicial

		for ($i = $mesInicial + 1; $i <= 12; $i++) { //loop que percorre os meses até o fim do ano inicial
			$diasTotais += $modeloDiasAnoInicial[$i]; //resulta na quantidade de dias do ano inicial
		}

		for ($j = 1; $j < $diferencaAnos; $j++) { //loop que percorre os anos entre as duas datas e calcula seus dias
			$anoInicial++;
			$diasAnoAtual = geraDiasBissexto(verificaBissexto($anoInicial));
			$diasTotais += $diasAnoAtual;
		}

		$modeloDiasAnoFinal = geraModeloDias(verificaBissexto($anoFinal)); //gera o modelo dos dias do ultimo ano

		for ($i = 1; $i < $mesFinal; $i++) { //lopp que percorre os meses do ultimo ano
			$diasTotais += $modeloDiasAnoFinal[$i]; //soma dos dias do ultimo ano
		}

		$diasTotais += $diaFinal; //soma os ultimos dias, do ultimo mês, do ultimo ano

		return $diasTotais;
	}

	/**
	 * CASO AS DATAS FOREM DE ANOS IGUAIS
	 */

	if ($mesInicial === $mesFinal) { // verifica se são do mesmo mes
		return $diaFinal - $diaInicial; // subtrai os dias
	}

	$modeloDiasAnoIgual = geraModeloDias(verificaBissexto($anoInicial)); // gera o modelo dos dias do ano das datas
	$diasTotais = $modeloDiasAnoIgual[$mesInicial] - $diaInicial; // calcula os dias do primeiro mes

	for ($k = $mesInicial + 1; $k < $mesFinal; $k++) { // loop que percorre os meses no intervalo entre o inicial e o final
		$diasTotais += $modeloDiasAnoIgual[$k]; // soma os dias com base no modelo
	}
	$diasTotais += $diaFinal; // soma dos ultimos dias do ultimo mes

	return $diasTotais;
}

/***** Teste 01 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-01-02";
$resultadoEsperado = 1;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("01", $resultadoEsperado, $resultado);

/***** Teste 02 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-01";
$resultadoEsperado = 31;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("02", $resultadoEsperado, $resultado);

/***** Teste 03 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-02";
$resultadoEsperado = 32;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("03", $resultadoEsperado, $resultado);

/***** Teste 04 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-28";
$resultadoEsperado = 58;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("04", $resultadoEsperado, $resultado);

/***** Teste 05 *****/
$dataInicial = "2018-01-15";
$dataFinal = "2018-03-15";
$resultadoEsperado = 59;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("05", $resultadoEsperado, $resultado);

/***** Teste 06 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2019-01-01";
$resultadoEsperado = 365;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("06", $resultadoEsperado, $resultado);

/***** Teste 07 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2020-01-01";
$resultadoEsperado = 730;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("07", $resultadoEsperado, $resultado);

/***** Teste 08 *****/
$dataInicial = "2018-12-31";
$dataFinal = "2019-01-01";
$resultadoEsperado = 1;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("08", $resultadoEsperado, $resultado);

/***** Teste 09 *****/
$dataInicial = "2018-05-31";
$dataFinal = "2018-06-01";
$resultadoEsperado = 1;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("09", $resultadoEsperado, $resultado);

/***** Teste 10 *****/
$dataInicial = "2018-05-31";
$dataFinal = "2019-06-01";
$resultadoEsperado = 366;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("10", $resultadoEsperado, $resultado);

/***** Teste 11 *****/
$dataInicial = "2016-02-01";
$dataFinal = "2016-03-01";
$resultadoEsperado = 29;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("11", $resultadoEsperado, $resultado);

/***** Teste 12 *****/
$dataInicial = "2016-01-01";
$dataFinal = "2016-03-01";
$resultadoEsperado = 60;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("12", $resultadoEsperado, $resultado);

/***** Teste 13 *****/
$dataInicial = "1981-09-21";
$dataFinal = "2009-02-12";
$resultadoEsperado = 10006;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("13", $resultadoEsperado, $resultado);

/***** Teste 14 *****/
$dataInicial = "1981-07-31";
$dataFinal = "2009-02-12";
$resultadoEsperado = 10058;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("14", $resultadoEsperado, $resultado);

/***** Teste 15 *****/
$dataInicial = "2004-03-01";
$dataFinal = "2009-02-12";
$resultadoEsperado = 1809;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("15", $resultadoEsperado, $resultado);

/***** Teste 16 *****/
$dataInicial = "2004-03-01";
$dataFinal = "2009-02-12";
$resultadoEsperado = 1809;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("16", $resultadoEsperado, $resultado);

/***** Teste 17 *****/
$dataInicial = "1900-02-01";
$dataFinal = "1900-03-01";
$resultadoEsperado = 28;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("17", $resultadoEsperado, $resultado);

/***** Teste 18 *****/
$dataInicial = "1899-01-01";
$dataFinal = "1901-01-01";
$resultadoEsperado = 730;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("18", $resultadoEsperado, $resultado);

/***** Teste 19 *****/
$dataInicial = "2000-02-01";
$dataFinal = "2000-03-01";
$resultadoEsperado = 29;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("19", $resultadoEsperado, $resultado);

/***** Teste 20 *****/
$dataInicial = "1999-01-01";
$dataFinal = "2001-01-01";
$resultadoEsperado = 731;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("20", $resultadoEsperado, $resultado);


function verificaResultado($nTeste, $resultadoEsperado, $resultado)
{
	if (intval($resultadoEsperado) == intval($resultado)) {
		echo "Teste $nTeste passou.\n";
	} else {
		echo "Teste $nTeste NAO passou (Resultado esperado = $resultadoEsperado, Resultado obtido = $resultado).\n";
	}
}
