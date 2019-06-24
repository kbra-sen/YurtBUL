<?php

namespace App\Form\Admin;

use App\Entity\Admin\YurtSahibi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YurtSahibiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adsoyad')
            ->add('email')
            ->add('sifre')
            ->add('telefon')
            ->add('yurtid')
            ->add('durum')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => YurtSahibi::class,
            'csrf_protection'=>false,
        ]);
    }
}
