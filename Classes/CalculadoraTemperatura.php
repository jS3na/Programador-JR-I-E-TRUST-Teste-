<?php

namespace Classes;

class CalculadoraTemperatura
{
    function menorTemperatura($temperaturas)
    {

        $maisProximoZero = null; // inicializa o maisProximoZero como null, pois pode ser que o mais proximo de 0 seja o proprio 0

        foreach ($temperaturas as $temperatura) { // loop que percorre o array
            if ($maisProximoZero === null) { // se for a primeira iteração, ele define o maisProximoZero como o primeiro numero do array
                $maisProximoZero = $temperatura;
                continue; // esse continue é para ele partir para o próximo ciclo no primeiro número
            }

            // essas duas linhas fazem a verificação de que se a temperatura for positiva, usa ela mesmo, e se não, transforma em positiva
            $difAtual = $temperatura > 0 ? $temperatura : ($temperatura * -1); // diferença de 0 da temperatura atual
            $difMenor = $maisProximoZero > 0 ? $maisProximoZero : ($maisProximoZero * -1); // diferença de 0 da temperatura que foi definida como menor até então

            if ($difAtual < $difMenor) { // verifica se a diferença da temperatura atual for menor que a diferença da temperatura definida
                $maisProximoZero = $temperatura;
            } elseif ($difAtual === $difMenor && $temperatura > $maisProximoZero) { // verifica se as distâncias são iguais e coloca como prioridade a positiva
                $maisProximoZero = $temperatura;
            }
        }

        return $maisProximoZero;
    }
}
