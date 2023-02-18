<?php

namespace App\Service;

use App\Entity\Document;
use LogicException;

class DocumentService
{
    public function __construct(
        protected string $documentPath
    ) {
    }

    /**
     * Get the path of the document where it'll be saved on the disk
     *
     * @param Document $document
     *
     * @return string
     */
    public function getDocumentPath(Document $document): string
    {
        $documentDirectory = sprintf(
            '%s/%s',
            $this->documentPath,
            implode('/', str_split($document->getCreatedAt()->format('Ymd')))
        );

        if (!is_dir($documentDirectory)) {
            mkdir($documentDirectory, 0777, true);
        }

        return sprintf(
            '%s/%s.%s',
            $documentDirectory,
            $document->getId(),
            $document->getExtension()
        );
    }

    public function getBase64ForDocument(Document $document): string
    {
        $filepath = $this->getDocumentPath($document);
        
        if (!is_file($filepath)) {
            throw new LogicException(sprintf(
                'The file for the document `%s` does not exist',
                $document->getId()
            ));
        }

        $base64 = base64_encode(file_get_contents($filepath));

        $document->setBase64($base64);

        return $base64;
    }
}
