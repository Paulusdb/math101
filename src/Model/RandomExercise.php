<?php

declare(strict_types=1);

namespace App\Model;

class RandomExercise
{
    public function exercise($operator)
    {
        if ($operator == '+') {
            $exercise = new AddingExercise();
            $exerciseArray = $exercise->exercise();
        }
        elseif ($operator == '-') {
            $exercise = new SubtractingExercise();
            $exerciseArray = $exercise->exercise();
        }
        elseif ($operator == '*') {
            $exercise = new MultiplyingExercise();
            $exerciseArray = $exercise->exercise();
        }
        else {
            $exercise = new DividingExercise();
            $exerciseArray = $exercise->exercise();
        }

        return $exerciseArray;
    }
}