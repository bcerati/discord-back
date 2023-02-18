<?php

namespace App\Serializer\Normalizer;

use App\Builder\DocumentBuilder;
use App\Entity\Document;
use App\Service\DocumentService;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DocumentNormalizer implements NormalizerInterface
{
    public function __construct(
        protected DocumentBuilder $documentBuilder,
        protected DocumentService $documentService,
    ) {
    }

    /** @var Document $document */
    public function normalize(mixed $document, string $format = null, array $context = [])
    {
        return [
            'id' => $document->getId(),
            'name' => $document->getName(),
            'extension' => $document->getExtension(),
            'createdAt' => $document->getCreatedAt()->format('Y-m-d H:i:s'),
            'base64' => $this->documentService->getBase64ForDocument($document)
        ];
    }

    public function supportsNormalization(mixed $document, string $format = null): bool
    {
        return $document instanceof Document;
    }
}
