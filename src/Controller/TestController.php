<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ExerciseType;
use App\Model\RandomExercise;
use App\Service\OperatorGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/toetsen", name="app_tests")
     */
    public function test(TestAnswerController $answerController, Request $request)
    {
        $operatorGenerator = new OperatorGenerator();
        $operator = $operatorGenerator->operator();

        $randomExercise = new RandomExercise();
        $randomExercise = $randomExercise->exercise($operator);

        $correctAnswer = $randomExercise['correctAnswer'];
        $exercise = $randomExercise['exercise'];

        $form = $this->createForm(ExerciseType::class);
        $form->handleRequest($request);

        $returnArray = [
            'operator' => $operator,
            'exercise' => $exercise,
            'test_form' => $form->createView(),
            'correctAnswer' => $correctAnswer,
        ];

        if ($form->isSubmitted() && $form->isValid()) {
            $processedAnswer = $answerController->process($form);
            if (is_object($processedAnswer)) {
                return $processedAnswer;
            }
            else {
                $returnArray = array_merge($returnArray, $processedAnswer);
            }
        }
        else {
            $returnArray['remainingExercises'] = 25;
            $returnArray['amountGood'] = 0;
            $returnArray['amountWrong'] = 0;
            $returnArray['amountAdd'] = 0;
            $returnArray['amountSubtract'] = 0;
            $returnArray['amountMultiply'] = 0;
            $returnArray['amountDivide'] = 0;
            $returnArray['amountWrongAdd'] = 0;
            $returnArray['amountWrongSubtract'] = 0;
            $returnArray['amountWrongMultiply'] = 0;
            $returnArray['amountWrongDivide'] = 0;
        }

        return $this->render('tests/tests.html.twig', $returnArray);
    }

    /**
     * @Route("/toetsen/uitleg", name="app_test_explanation")
     */
    public function testExplanation()
    {
        return $this->render('tests/test_explanation.html.twig');
    }
}