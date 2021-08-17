<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\PracticeResults;
use App\Service\AnswerChecker;
use App\Service\PracticeResultCounter;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PracticeAnswerController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($form, $subTopic): array
    {
        $previousCorrectAnswer = $form->get('correctAnswer')->getData();
        $previousExercise = $form->get('exercise')->getData();
        $answer = $form->get('answer')->getData();
        $answerChecker = new AnswerChecker();
        $result = $answerChecker->checkAnswer($answer, $previousCorrectAnswer);

        if ($this->isGranted('ROLE_USER')) {
            $username = $this->getUser()->getUsername();
            $dateTime = new DateTime();
            $repository = $this->entityManager->getRepository(PracticeResults::class);
            $practiceResult = $repository->findOneBy(['username' => $username, 'subTopic' => $subTopic, 'date' => $dateTime]);

            $practiceCounter = new PracticeResultCounter();
            $practiceResult = $practiceCounter->count($practiceResult, $result);

            $practiceResult
                ->setUsername($username)
                ->setTopic('Negatieve getallen')
                ->setSubTopic($subTopic)
                ->setDate($dateTime);

            $this->entityManager->persist($practiceResult);
            $this->entityManager->flush();
        }

        return [
            'previousCorrectAnswer' => $previousCorrectAnswer,
            'previousExercise' => $previousExercise,
            'answer' => $answer,
            'result' => $result,
        ];
    }
}