<?php

namespace Symfony\UX\Upload\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\UX\Upload\Adapters\LocalTemporaryFileAdapter;
use Symfony\UX\Upload\Controller\FileUploadController;
use Symfony\UX\Upload\Form\UploadFileTypeExtension;
use Symfony\UX\Upload\TemporaryFilenameManager;

class UploadExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container
            ->register('ux.upload.temporary_filename_manager', TemporaryFilenameManager::class);

        $container
            ->register('ux.upload.local_temporary_file_adapter', LocalTemporaryFileAdapter::class)
            ->setArguments([
                new Reference('router'),
                new Reference('uri_signer'),
            ]);

        $container
            ->register('ux.upload.file_upload_controller', FileUploadController::class)
            ->setArguments([
                new Reference('ux.upload.temporary_filename_manager'),
                new Reference('ux.upload.local_temporary_file_adapter'),
            ])
            ->addTag('controller.service_arguments');

        $container
            ->register('ux.upload.file_type_extension', UploadFileTypeExtension::class)
            ->addTag('form.type_extension');
    }
}