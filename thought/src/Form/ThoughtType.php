<?php

namespace App\Form;

use App\Entity\Thought;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ThoughtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Name your thought : ',
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => 30,
                        'minMessage' => 'Your thought must be at least {{ limit }} characters long',
                        'maxMessage' => 'Your thought cannot be longer than {{ limit }} characters'
                    ]),
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'What is your thinking of the day : ',
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => 500,
                        'minMessage' => 'Your thought must be at least {{ limit }} characters long',
                        'maxMessage' => 'Your thought cannot be longer than {{ limit }} characters'
                    ]),
                ]
            ])
            ->add('colors', null, [
                'label' => 'How do you feel :',
                'required' => true, 
                'multiple' => false,
                'expanded' => true,
            ] )
            ->add('save', SubmitType::class, [
                'label' => 'Create my thought'
            ])
         
        
       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thought::class,
        ]);
    }
}
