<?php

namespace App\Builder;

use App\Entity\Document;

class DocumentBuilder
{
    public function buildFromString(
        string $base64,
        string $name,
    ): Document
    {
        $document = new Document();
        $document
            ->setName(pathinfo($name, PATHINFO_FILENAME))
            ->setExtension(pathinfo($name, PATHINFO_EXTENSION))
            ->setBase64($base64);

        return $document;
    }
}
