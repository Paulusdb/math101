<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\PracticeResults;

class PracticeResultCounter
{
    public function count($practiceResult, $result)
    {
        if (!$practiceResult == null) {
            $exerciseQuantity = $practiceResult->getExerciseQuantity();
            $amountGood = $practiceResult->getAmountGood();
            $amountWrong = $practiceResult->getAmountWrong();
        }
        else {
            $exerciseQuantity = 0;
            $amountGood = 0;
            $amountWrong = 0;
            $practiceResult = new PracticeResults();
        }

        $exerciseQuantity++;
        if ($result == 'goed') {
            $amountGood++;
        }
        else {
            $amountWrong++;
        }

        $practiceResult
            ->setExerciseQuantity($exerciseQuantity)
            ->setAmountGood($amountGood)
            ->setAmountWrong($amountWrong);

        return $practiceResult;
    }
}