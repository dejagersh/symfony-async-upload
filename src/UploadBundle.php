<?php

namespace Symfony\UX\Upload;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UploadBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}