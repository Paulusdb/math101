<?php

declare(strict_types=1);

namespace App\Model;

class DividingExercise
{
    public function exercise(): array
    {
        //willekeurige getallen tussen -10 en 30
        $number1 = rand(-100, 100);
        $number2 = rand(-10, 10);

        //zorgen dat beide getallen ongelijk aan 0 zijn en minstens 1 van beide negatief
        while ($number1 == 0 or $number2 == 0 or ($number1 > 0 and $number2 > 0)) {
            $number1 = rand(-100, 100);
            $number2 = rand(-10, 10);
        }

        //zorgen dat de deling op een geheel getal uitkomt en op een getal kleiner dan 10
        while ($number1 % $number2 != 0 or ($number1 / $number2) > 12 or ($number1 / $number2) < -12) {
            if ($number1 < 0 and $number2 > 0) {
                $number1 = rand(-100, -1);
            }
            elseif ($number2 < 0) {
                $number1 = rand(-100, 100);
                while ($number1 == 0) {
                    $number1 = rand(-100, 100);
                }
            }
        }
        $correctAnswer = $number1 / $number2;

        //de vraag die gesteld wordt
        $exercise = $number1 . ' : ' . $number2;

        return ['correctAnswer' => $correctAnswer, 'exercise' => $exercise];
    }
}