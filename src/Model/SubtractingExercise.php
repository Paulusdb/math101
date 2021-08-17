<?php

declare(strict_types=1);

namespace App\Model;

class SubtractingExercise
{
    public function exercise(): array
    {
        //willekeurige getallen tussen -10 en 30
        $number1 = rand(-20, 20);
        $number2 = rand(-20, 20);

        //zorgen dat beide getallen ongelijk aan 0 zijn en minstens 1 van beide negatief
        while ($number1 == 0 or $number2 == 0 or ($number1 > 0 and $number2 > 0)) {
            $number1 = rand(-20, 20);
            $number2 = rand(-20, 20);
        }
        $correctAnswer = $number1 - $number2;

        //de vraag die gesteld wordt
        $exercise = $number1 . ' - ' . $number2;

        return ['correctAnswer' => $correctAnswer, 'exercise' => $exercise];
    }
}