<?php

namespace Symfony\UX\Upload\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\UX\Upload\Adapters\LocalTemporaryFileAdapter;
use Symfony\UX\Upload\TemporaryFilenameManager;

final class FileUploadController
{
    public function __construct(
        private TemporaryFilenameManager $temporaryFilenameManager,
        private LocalTemporaryFileAdapter $localTemporaryFileAdapter
    )
    {
    }

    public function initiateUpload(): JsonResponse
    {
        $tmpFilename = $this->temporaryFilenameManager->generate(
            'filename',
            'application/octet-stream',
        );

        return new JsonResponse([
            'tmpFilename' => $tmpFilename,
            'uploadUrl' => $this->localTemporaryFileAdapter->initiateUpload(
                $tmpFilename,
                'application/octet-stream',
            )
        ]);
    }

    public function upload(string $filename, #[MapQueryParameter] int $expires): JsonResponse
    {
        dd($filename, $expires);

        return new JsonResponse('Upload actually');
    }
}