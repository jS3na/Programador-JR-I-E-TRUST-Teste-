<?php

/**
* Retorna a temperatura mais proxima de zero.
* Se duas temperaturas com o mesmo valor absouto (uma positiva e outra negativa) serem igualmente proxima a zero, deve ser dada a preferencia para o valor positivo.
* @param array $temperaturas Lista de temperaturas
* @return int A temperatura mais proxima de zero
**/
function menorTemperatura($temperaturas) {

	
	$maisProximoZero = null; // inicializa o maisProximoZero como null, pois pode ser que o mais proximo de 0 seja o proprio 0
	
	foreach($temperaturas as $temperatura){ // loop que percorre o array

		if($maisProximoZero === null){ // se for a primeira iteração, ele define o maisProximoZero como o primeiro numero do array
			$maisProximoZero = $temperatura;
			continue; // esse continue é para ele partir para o próximo ciclo no primeiro número
		}

		// essas duas linhas fazem a verificação de que se a temperatura for positiva, usa ela mesmo, e se não, transforma em positiva
		$difAtual = $temperatura > 0 ? $temperatura : ($temperatura * -1); // diferença de 0 da temperatura atual
		$difMenor = $maisProximoZero > 0 ? $maisProximoZero : ($maisProximoZero * -1); // diferença de 0 da temperatura que foi definida como menor até então

		if($difAtual < $difMenor){ // verifica se a diferença da temperatura atual for menor que a diferença da temperatura definida
			$maisProximoZero = $temperatura;
		}
		else if($difAtual === $difMenor && $temperatura > $maisProximoZero){ // verifica se as distâncias são iguais e coloca como prioridade a positiva
			$maisProximoZero = $temperatura;
		}
	}

	return $maisProximoZero;
}


/***** Teste 01 *****/
$temperaturas = array( 17, 32, 14, 21 );
$resultadoEsperado = 14;
$resultado = menorTemperatura($temperaturas);
verificaResultado("01", $resultadoEsperado, $resultado);


/***** Teste 02 *****/
$temperaturas = array( 27, -8, -12, 9 );
$resultadoEsperado = -8;
$resultado = menorTemperatura($temperaturas);
verificaResultado("02", $resultadoEsperado, $resultado);


/***** Teste 03 *****/
$temperaturas = array( -6, 14, 42, 6, 25, -18 );
$resultadoEsperado = 6;
$resultado = menorTemperatura($temperaturas);
verificaResultado("03", $resultadoEsperado, $resultado);


/***** Teste 04 *****/
$temperaturas = array( 34, 11, 13, -23, -11, 18 );
$resultadoEsperado = 11;
$resultado = menorTemperatura($temperaturas);
verificaResultado("04", $resultadoEsperado, $resultado);


/***** Teste 05 *****/
$temperaturas = array( 17, 0, 28, -4 );
$resultadoEsperado = 0;
$resultado = menorTemperatura($temperaturas);
verificaResultado("05", $resultadoEsperado, $resultado);

/***** Teste 06 *****/
$temperaturas = array( -10, 27, 9, -12 );
$resultadoEsperado = 9;
$resultado = menorTemperatura($temperaturas);
verificaResultado("06", $resultadoEsperado, $resultado);

/***** Teste 07 *****/
$temperaturas = array( -47, -14, -5, -12, -8 );
$resultadoEsperado = -5;
$resultado = menorTemperatura($temperaturas);
verificaResultado("07", $resultadoEsperado, $resultado);

/***** Teste 08 *****/
$temperaturas = array( -47, -14, -5, -12, -5 );
$resultadoEsperado = -5;
$resultado = menorTemperatura($temperaturas);
verificaResultado("08", $resultadoEsperado, $resultado);

/***** Teste 09 *****/
$temperaturas = array( -7, 12, -13, 8 );
$resultadoEsperado = -7;
$resultado = menorTemperatura($temperaturas);
verificaResultado("09", $resultadoEsperado, $resultado);


function verificaResultado($nTeste, $resultadoEsperado, $resultado) {
	if(intval($resultadoEsperado) === intval($resultado)) {
		echo "Teste $nTeste passou.\n";
	} else {
		echo "Teste $nTeste NAO passou (Resultado esperado = $resultadoEsperado, Resultado obtido = $resultado).\n";
	}
}

?>