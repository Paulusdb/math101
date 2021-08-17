<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\TestResults;
use App\Service\AnswerChecker;
use App\Service\TestResultCounter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestAnswerController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $form
     * @return array|\Symfony\Component\HttpFoundation\Response
     */
    public function process($form)
    {
        $previousCorrectAnswer = $form->get('correctAnswer')->getData();
        $answer = $form->get('answer')->getData();
        $answerChecker = new AnswerChecker();
        $result = $answerChecker->checkAnswer($answer, $previousCorrectAnswer);

        $remainingExercises = $form->get('remainingExercises')->getData();
        $amountGood = $form->get('amountGood')->getData();
        $amountWrong = $form->get('amountWrong')->getData();
        $previousOperator = $form->get('operator')->getData();
        $amountAdd = $form->get('amountAdd')->getData();
        $amountSubtract = $form->get('amountSubtract')->getData();
        $amountMultiply = $form->get('amountMultiply')->getData();
        $amountDivide = $form->get('amountDivide')->getData();
        $amountWrongAdd = $form->get('amountWrongAdd')->getData();
        $amountWrongSubtract = $form->get('amountWrongSubtract')->getData();
        $amountWrongMultiply = $form->get('amountWrongMultiply')->getData();
        $amountWrongDivide = $form->get('amountWrongDivide')->getData();

        $counter = new TestResultCounter();
        $counterArray = $counter->count($result, $remainingExercises, $amountGood, $amountWrong, $previousOperator, $amountAdd, $amountSubtract, $amountMultiply, $amountDivide, $amountWrongAdd, $amountWrongSubtract, $amountWrongMultiply, $amountWrongDivide);

        $amountGood = $counterArray['amountGood'];
        $amountWrong = $counterArray['amountWrong'];
        $remainingExercises = $counterArray['remainingExercises'];
        $previousOperator = $counterArray['previousOperator'];
        $amountAdd = $counterArray['amountAdd'];
        $amountSubtract = $counterArray['amountSubtract'];
        $amountMultiply = $counterArray['amountMultiply'];
        $amountDivide = $counterArray['amountDivide'];
        $amountWrongAdd = $counterArray['amountWrongAdd'];
        $amountWrongSubtract = $counterArray['amountWrongSubtract'];
        $amountWrongMultiply = $counterArray['amountWrongMultiply'];
        $amountWrongDivide = $counterArray['amountWrongDivide'];

        if ($remainingExercises == 0) {
            $grade = $amountGood/25*9+1;
            $grade = round($grade, 1);

            if ($this->isGranted('ROLE_USER')) {
                $testResult = new TestResults();
                $testResult->setUsername($this->getUser()->getUsername());
                $testResult->setGrade($grade);
                $testResult->setTopic('Negatieve Getallen');
                $testResult->setAmountGood($amountGood);
                $testResult->setAmountWrong($amountWrong);
                $testResult->setDateTime(new \DateTime());
                $testResult->setAmountAdd($amountAdd);
                $testResult->setAmountSubtract($amountSubtract);
                $testResult->setAmountMultiply($amountMultiply);
                $testResult->setAmountDivide($amountDivide);
                $testResult->setAmountWrongAdd($amountWrongAdd);
                $testResult->setAmountWrongSubtract($amountWrongSubtract);
                $testResult->setAmountWrongMultiply($amountWrongMultiply);
                $testResult->setAmountWrongDivide($amountWrongDivide);

                $this->entityManager->persist($testResult);
                $this->entityManager->flush();
            }

            return $this->render('tests/test_result.html.twig', [
                'grade' => $grade,
                'amountGood' => $amountGood,
                'amountWrong' => $amountWrong,
                'amountAdd' => $amountAdd,
                'amountSubtract' => $amountSubtract,
                'amountMultiply' => $amountMultiply,
                'amountDivide' => $amountDivide,
                'amountWrongAdd' => $amountWrongAdd,
                'amountWrongSubtract' => $amountWrongSubtract,
                'amountWrongMultiply' => $amountWrongMultiply,
                'amountWrongDivide' => $amountWrongDivide,
            ]);
        }

        return [
            'amountGood' => $amountGood,
            'amountWrong' => $amountWrong,
            'remainingExercises' => $remainingExercises,
            'previousCorrectAnswer' => $previousCorrectAnswer,
            'answer' => $answer,
            'result' => $result,
            'previousOperator' => $previousOperator,
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