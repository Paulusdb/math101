<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ExerciseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answer', IntegerType::class, [
                'attr' => ['autofocus' => null],
                'required' => true,
            ])
            ->add('correctAnswer', HiddenType::class)
            ->add('exercise', HiddenType::class)
            ->add('remainingExercises', HiddenType::class)
            ->add('amountGood', HiddenType::class)
            ->add('amountWrong', HiddenType::class)
            ->add('operator', HiddenType::class)
            ->add('amountAdd', HiddenType::class)
            ->add('amountSubtract', HiddenType::class)
            ->add('amountMultiply', HiddenType::class)
            ->add('amountDivide', HiddenType::class)
            ->add('amountWrongAdd', HiddenType::class)
            ->add('amountWrongSubtract', HiddenType::class)
            ->add('amountWrongMultiply', HiddenType::class)
            ->add('amountWrongDivide', HiddenType::class)
            ->add('submit', SubmitType::class);
    }
}