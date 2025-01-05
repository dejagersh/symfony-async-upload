<?php

namespace Symfony\UX\Upload\Adapters;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\UriSigner;

class LocalTemporaryFileAdapter
{
    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private UriSigner $uriSigner,
    )
    {
    }

    public function initiateUpload(string $tmpFilename): string
    {
        $uploadUrl = $this->urlGenerator->generate(
            'ux_upload_upload',
            ['filename' => $tmpFilename, 'expires' => time() + (5 * 60)], // Expires in 5 minutes
            UrlGeneratorInterface::ABSOLUTE_URL,
        );

        return $this->uriSigner->sign($uploadUrl);
    }
}