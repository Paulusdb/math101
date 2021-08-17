<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Email',
            ])
            ->add('plainPassword', PasswordType::class, [
                'required' => true,
                'label' => 'Password',
                'mapped' => false
            ])
            ->add('userType', ChoiceType::class, [
                'choices' => [
                    'Docent' => 'teacher',
                    'Leerling' => 'student',
                ],
                'label' => 'Docent/Leerling',
                'required' => true,
            ])
            ->add('class', TextType::class, [
                'label' => 'Klas (meerdere klassen scheiden met een komma)'
            ])
            ->add('username', TextType::class, [
                'label' => 'Gebruikersnaam',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
