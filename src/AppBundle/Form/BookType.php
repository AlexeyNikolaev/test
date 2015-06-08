<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text')
            ->add('date', 'datetime', [
                'widget' => 'choice',
                'placeholder' => ['year' => 'Year']
            ])
            ->add('author', 'entity', [
                'class' => 'AppBundle\Entity\Author',
                'property' => 'fullName'
            ]);

    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getDefaultOptionss($options)
    {
        return ['csrf_protection' => false];
    }

    public function getName()
    {
        return 'book';
    }
}
