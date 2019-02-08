<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfesorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
      ->add('nombre')
      ->add('apellidos');
        if($options['asignaturas']!=null)
        {
          $builder
          ->add('asignaturas');
        }
          $builder
          ->add('salvar',SubmitType::class,array('label'=>"Nuevo Profesor",'attr' => ['class' => 'btn waves-effect waves-light indigo lighten-2']));

      }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Profesor',
            'asignaturas' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_profesor';
    }


}
