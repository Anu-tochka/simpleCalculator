<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('arg1')
            ->add('arg2')
            ->add('sign', ChoiceType::class, array(
                'choices' => array(
                    '+' => '+',
                    '-' => '-',
                    '*' => '*',
                    '/' => '/'
                ))
			)
        ;
    }

}
