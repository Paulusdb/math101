<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\AddingExercise;

class AnswerChecker
{
    public function checkAnswer($answer, $previousCorrectAnswer): string
    {
        if ($answer == $previousCorrectAnswer) {
            $result = 'goed';
        }
        else {
            $result = 'fout';
        }

        return $result;
    }
}