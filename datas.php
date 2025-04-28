<?php

require 'vendor/autoload.php';

use Classes\CalculadoraData;

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

/***** Teste 01 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-01-02";
$resultadoEsperado = 1;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("01", $resultadoEsperado, $resultado);

/***** Teste 02 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-01";
$resultadoEsperado = 31;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("02", $resultadoEsperado, $resultado);

/***** Teste 03 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-02";
$resultadoEsperado = 32;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("03", $resultadoEsperado, $resultado);

/***** Teste 04 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-28";
$resultadoEsperado = 58;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("04", $resultadoEsperado, $resultado);

/***** Teste 05 *****/
$dataInicial = "2018-01-15";
$dataFinal = "2018-03-15";
$resultadoEsperado = 59;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("05", $resultadoEsperado, $resultado);

/***** Teste 06 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2019-01-01";
$resultadoEsperado = 365;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("06", $resultadoEsperado, $resultado);

/***** Teste 07 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2020-01-01";
$resultadoEsperado = 730;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("07", $resultadoEsperado, $resultado);

/***** Teste 08 *****/
$dataInicial = "2018-12-31";
$dataFinal = "2019-01-01";
$resultadoEsperado = 1;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("08", $resultadoEsperado, $resultado);

/***** Teste 09 *****/
$dataInicial = "2018-05-31";
$dataFinal = "2018-06-01";
$resultadoEsperado = 1;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("09", $resultadoEsperado, $resultado);

/***** Teste 10 *****/
$dataInicial = "2018-05-31";
$dataFinal = "2019-06-01";
$resultadoEsperado = 366;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("10", $resultadoEsperado, $resultado);

/***** Teste 11 *****/
$dataInicial = "2016-02-01";
$dataFinal = "2016-03-01";
$resultadoEsperado = 29;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("11", $resultadoEsperado, $resultado);

/***** Teste 12 *****/
$dataInicial = "2016-01-01";
$dataFinal = "2016-03-01";
$resultadoEsperado = 60;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("12", $resultadoEsperado, $resultado);

/***** Teste 13 *****/
$dataInicial = "1981-09-21";
$dataFinal = "2009-02-12";
$resultadoEsperado = 10006;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("13", $resultadoEsperado, $resultado);

/***** Teste 14 *****/
$dataInicial = "1981-07-31";
$dataFinal = "2009-02-12";
$resultadoEsperado = 10058;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("14", $resultadoEsperado, $resultado);

/***** Teste 15 *****/
$dataInicial = "2004-03-01";
$dataFinal = "2009-02-12";
$resultadoEsperado = 1809;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("15", $resultadoEsperado, $resultado);

/***** Teste 16 *****/
$dataInicial = "2004-03-01";
$dataFinal = "2009-02-12";
$resultadoEsperado = 1809;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("16", $resultadoEsperado, $resultado);

/***** Teste 17 *****/
$dataInicial = "1900-02-01";
$dataFinal = "1900-03-01";
$resultadoEsperado = 28;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("17", $resultadoEsperado, $resultado);

/***** Teste 18 *****/
$dataInicial = "1899-01-01";
$dataFinal = "1901-01-01";
$resultadoEsperado = 730;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("18", $resultadoEsperado, $resultado);

/***** Teste 19 *****/
$dataInicial = "2000-02-01";
$dataFinal = "2000-03-01";
$resultadoEsperado = 29;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("19", $resultadoEsperado, $resultado);

/***** Teste 20 *****/
$dataInicial = "1999-01-01";
$dataFinal = "2001-01-01";
$resultadoEsperado = 731;
$calculadora = new CalculadoraData($dataInicial, $dataFinal);
$resultado = $calculadora->calculaDias();
verificaResultado("20", $resultadoEsperado, $resultado);


function verificaResultado($nTeste, $resultadoEsperado, $resultado)
{
    if (intval($resultadoEsperado) == intval($resultado)) {
        echo "Teste $nTeste passou.\n";
    } else {
        echo "Teste $nTeste NAO passou (Resultado esperado = $resultadoEsperado, Resultado obtido = $resultado).\n";
    }
}
