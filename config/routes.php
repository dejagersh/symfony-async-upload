<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('ux_upload_initiate_upload', '/initiate')
        ->controller(['ux.upload.file_upload_controller', 'initiateUpload']);

    $routes->add('ux_upload_upload', '/{filename}')
        ->controller(['ux.upload.file_upload_controller', 'upload']);
};