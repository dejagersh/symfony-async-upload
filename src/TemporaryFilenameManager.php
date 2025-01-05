<?php

namespace Symfony\UX\Upload;

use Symfony\Component\Mime\MimeTypes;

class TemporaryFilenameManager
{
    public function generate(string $originalFilename, ?string $mimeType): string
    {
        $extension = MimeTypes::getDefault()->getExtensions(
            $mimeType ?: 'application/octet-stream',
        )[0] ?? null;

        $meta = '-meta' . \base64_encode($originalFilename) . '-';
        $meta = \strtr($meta, '/', '_');

        return uniqid() . $meta . ($extension ? '.' . $extension : '');
    }

    public function extractOriginalFilename(string $tmpFilename): string
    {
        $path = \strtr($tmpFilename, '_', '/');
        $parts = \explode('-meta', $path);
        $lastPart = \end($parts);
        $subParts = \explode('-', $lastPart);
        $encodedName = \reset($subParts);

        return \base64_decode($encodedName);
    }
}