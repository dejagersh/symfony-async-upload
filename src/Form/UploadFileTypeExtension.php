<?php

namespace Symfony\UX\Upload\Form;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadFileTypeExtension extends AbstractTypeExtension
{
    public static function getExtendedTypes(): iterable
    {
        return [
            FileType::class,
        ];
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined(['async']);
    }

    public function finishView(FormView $view, FormInterface $form, array $options): void
    {
        $attr = $view->vars['attr'] ?? [];

        $attr['data-controller'] = 'whoop';

        $view->vars['attr'] = $attr;
    }
}