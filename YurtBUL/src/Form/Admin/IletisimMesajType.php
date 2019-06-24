<?php

namespace App\Form\Admin;

use App\Entity\Admin\IletisimMesaj;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IletisimMesajType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ad')
            ->add('email')
            ->add('konu')
            ->add('mesaj')
            ->add('comment')
            ->add('status')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IletisimMesaj::class,
            'csrf_protection'=>true,
        ]);
    }
}
