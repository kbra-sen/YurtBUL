<?php

namespace App\Form\Admin;

use App\Entity\Admin\Yurt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YurtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('image')
            ->add('yursahibid')
            ->add('adres')
            ->add('sehirid')
            ->add('ilce')
            ->add('telefon')
            ->add('tipid')
            ->add('turid')
            ->add('yil')
            ->add('fiyat')
            ->add('webpage')
            ->add('aciklama')
            ->add('durum')
            ->add('keyword')
            ->add('description')
            ->add('categoryid')
            ->add('userid')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Yurt::class,
            'csrf_protection'=>false,

        ]);
    }
}
