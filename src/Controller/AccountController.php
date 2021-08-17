<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\PracticeResults;
use App\Entity\TestResults;
use App\Entity\User;
use App\Form\TestResultType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account")
     * @IsGranted("ROLE_USER")
     */
    public function account(EntityManagerInterface $entityManager, Request $request)
    {
        $username = $this->getUser()->getUsername();
        $userRepository = $entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['username' => $username]);
        $userType = $user->getUserType();

        if ($userType == 'teacher') {
            $form = $this->createForm(TestResultType::class);
            $form->handleRequest($request);

            $classes = $user->getClass();

            foreach ($classes as $class) {

                $usersFromClass = $userRepository->findBy(['class' => $class, 'userType' => 'student']);

                if ($usersFromClass) {
                    foreach ($usersFromClass as $userFromClass) {
                        $username = $userFromClass->getUsername();

                        $practiceRepository = $entityManager->getRepository(PracticeResults::class);
                        $practiceResult = $practiceRepository->findBy(['username' => $username], ['date' => 'Desc']);
                        $practiceResults[$class][$username] = $practiceResult;

                        $testRepository = $entityManager->getRepository(TestResults::class);
                        $testResult = $testRepository->findBy(['username' => $username], ['dateTime' => 'Desc']);
                        $testResults[$class][$username] = $testResult;
                    }
                }
                else {
                    $practiceResults[$class] = [];
                    $testResults[$class] = [];
                }
            }
            $results = array_merge_recursive($practiceResults, $testResults);
            dump($results, $testResults, $practiceResults);
            return $this->render('account/account_teacher.html.twig', [
                'practiceResults' => $practiceResults,
                'testResults' => $testResults,
                'results' => $results,
            ]);
        }
        else {
            $practiceRepository = $entityManager->getRepository(PracticeResults::class);
            $practiceResults = $practiceRepository->findBy(['username' => $username]);

            $testRepository = $entityManager->getRepository(TestResults::class);
            $testResults = $testRepository->findBy(['username' => $username]);

            $forms = [];
            foreach ($testResults as $i => $something) {
                $forms[$i] = $this->container
                    ->get('form.factory')
                    ->createNamed('result_form' . $i, TestResultType::class);
                ;
            }

            foreach ($forms as $form)
            {
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid())
                {
                    $testResultId = $form->get('id')->getData();
                    $testResult = $testRepository->findOneBy(['id' => $testResultId]);

                    return $this->render('account/account_test_result.html.twig', [
                        'testResult' => $testResult,
                    ]);
                }
            }

            foreach ($forms as &$form) {
                $form = $form->createView();
            }

            return $this->render('account/account_student.html.twig', [
                'practiceResults' => $practiceResults,
                'testResults' => $testResults,
                'result_forms' => $forms,
            ]);
        }
    }
}