<?php

namespace App\Form;

use App\Entity\Gender;
use App\Entity\SchoolClass;
use App\Entity\Student;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('first_name', TextType::class)
            ->add('last_name', TextType::class)
            ->add('schoolClass', EntityType::class, [
                'class' => SchoolClass::class,
                'choice_label' => 'level',
            ])
            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                'choice_label' => 'gender_value',
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
