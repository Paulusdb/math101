<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ExerciseType;
use App\Model\AddingExercise;
use App\Model\DividingExercise;
use App\Model\MultiplyingExercise;
use App\Model\RandomExercise;
use App\Model\SubtractingExercise;
use App\Service\OperatorGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PracticeController extends AbstractController
{
    /**
     * @Route("/oefenen", name="app_practice")
     */
    public function practice()
    {
        return $this->render('practice/practice.html.twig');
    }

    /**
     * @Route("/oefenen/optellen", name="app_practice_add")
     */
    public function practiceAdd(PracticeAnswerController $answerController, Request $request)
    {
        $subTopic = 'Optellen';
        $addingExercise = new AddingExercise();
        $addingExercise = $addingExercise->exercise();
        $correctAnswer = $addingExercise['correctAnswer'];
        $exercise = $addingExercise['exercise'];

        $form = $this->createForm(ExerciseType::class);
        $form->handleRequest($request);

        $returnArray = [
            'exercise' => $exercise,
            'exercise_form' => $form->createView(),
            'correctAnswer' => $correctAnswer,
        ];

        if ($form->isSubmitted() && $form->isValid()) {
            $processedAnswer = $answerController->process($form, $subTopic);
            $returnArray = array_merge($returnArray, $processedAnswer);
        }

        return $this->render('practice/practice_add.html.twig', $returnArray);
    }

    /**
     * @Route("/oefenen/aftrekken", name="app_practice_subtract")
     */
    public function practiceSubtract(PracticeAnswerController $answerController, Request $request)
    {
        $subTopic = 'Aftrekken';
        $subtractingExercise = new SubtractingExercise();
        $subtractingExercise = $subtractingExercise->exercise();
        $correctAnswer = $subtractingExercise['correctAnswer'];
        $exercise = $subtractingExercise['exercise'];

        $form = $this->createForm(ExerciseType::class);
        $form->handleRequest($request);

        $returnArray = [
            'exercise' => $exercise,
            'exercise_form' => $form->createView(),
            'correctAnswer' => $correctAnswer,
        ];

        if ($form->isSubmitted() && $form->isValid()) {
            $processedAnswer = $answerController->process($form, $subTopic);
            $returnArray = array_merge($returnArray, $processedAnswer);
        }

        return $this->render('practice/practice_subtract.html.twig', $returnArray);
    }

    /**
     * @Route("/oefenen/vermenigvuldigen", name="app_practice_multiply")
     */
    public function practiceMultiply(PracticeAnswerController $answerController, Request $request)
    {
        $subTopic = 'Vermenigvuldigen';
        $multiplyingExercise = new MultiplyingExercise();
        $multiplyingExercise = $multiplyingExercise->exercise();
        $correctAnswer = $multiplyingExercise['correctAnswer'];
        $exercise = $multiplyingExercise['exercise'];

        $form = $this->createForm(ExerciseType::class);
        $form->handleRequest($request);

        $returnArray = [
            'exercise' => $exercise,
            'exercise_form' => $form->createView(),
            'correctAnswer' => $correctAnswer,
        ];

        if ($form->isSubmitted() && $form->isValid()) {
            $processedAnswer = $answerController->process($form, $subTopic);
            $returnArray = array_merge($returnArray, $processedAnswer);
        }

        return $this->render('practice/practice_multiply.html.twig', $returnArray);
    }

    /**
     * @Route("/oefenen/delen", name="app_practice_divide")
     */
    public function practiceDivide(PracticeAnswerController $answerController, Request $request)
    {
        $subTopic = 'Delen';
        $dividingExercise = new DividingExercise();
        $dividingExercise = $dividingExercise->exercise();
        $correctAnswer = $dividingExercise['correctAnswer'];
        $exercise = $dividingExercise['exercise'];

        $form = $this->createForm(ExerciseType::class);
        $form->handleRequest($request);

        $returnArray = [
            'exercise' => $exercise,
            'exercise_form' => $form->createView(),
            'correctAnswer' => $correctAnswer,
        ];

        if ($form->isSubmitted() && $form->isValid()) {
            $processedAnswer = $answerController->process($form, $subTopic);
            $returnArray = array_merge($returnArray, $processedAnswer);
        }

        return $this->render('practice/practice_divide.html.twig', $returnArray);
    }

    /**
     * @Route("/oefenen/door-elkaar", name="app_practice_all")
     */
    public function practiceAll(PracticeAnswerController $answerController, Request $request)
    {
        $subTopic = 'Door elkaar';
        $operatorGenerator = new OperatorGenerator();
        $operator = $operatorGenerator->operator();

        $randomExercise = new RandomExercise();
        $randomExercise = $randomExercise->exercise($operator);

        $correctAnswer = $randomExercise['correctAnswer'];
        $exercise = $randomExercise['exercise'];

        $form = $this->createForm(ExerciseType::class);
        $form->handleRequest($request);

        $returnArray = [
            'exercise' => $exercise,
            'exercise_form' => $form->createView(),
            'correctAnswer' => $correctAnswer,
        ];

        if ($form->isSubmitted() && $form->isValid()) {
            $processedAnswer = $answerController->process($form, $subTopic);
            $returnArray = array_merge($returnArray, $processedAnswer);
        }

        return $this->render('practice/practice_all.html.twig', $returnArray);
    }
}