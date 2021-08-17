<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\PracticeResults;

class TestResultCounter
{
    public function count($result, $remainingExercises, $amountGood, $amountWrong, $operator,
                          $amountAdd, $amountSubtract, $amountMultiply, $amountDivide,
                          $amountWrongAdd, $amountWrongSubtract, $amountWrongMultiply, $amountWrongDivide)
    {
        $remainingExercises--;

        if ($result == 'goed') {
            $amountGood++;
            if ($operator == '+') {
                $amountAdd++;
            }
            elseif ($operator == '-') {
                $amountSubtract++;
            }
            elseif ($operator == '*') {
                $amountMultiply++;
            }
            else {
                $amountDivide++;
            }
        }
        else {
            $amountWrong++;
            if ($operator == '+') {
                $amountAdd++;
                $amountWrongAdd++;
            }
            elseif ($operator == '-') {
                $amountSubtract++;
                $amountWrongSubtract++;
            }
            elseif ($operator == '*') {
                $amountMultiply++;
                $amountWrongMultiply++;
            }
            else {
                $amountDivide++;
                $amountWrongDivide++;
            }
        }

        return [
            'amountGood' => $amountGood,
            'amountWrong' => $amountWrong,
            'remainingExercises' => $remainingExercises,
            'previousOperator' => $operator,
            'amountAdd' => $amountAdd,
            'amountSubtract' => $amountSubtract,
            'amountMultiply' => $amountMultiply,
            'amountDivide' => $amountDivide,
            'amountWrongAdd' => $amountWrongAdd,
            'amountWrongSubtract' => $amountWrongSubtract,
            'amountWrongMultiply' => $amountWrongMultiply,
            'amountWrongDivide' => $amountWrongDivide,
        ];
    }
}