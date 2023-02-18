<?php

namespace App\Serializer\Denormalizer;

use App\Builder\DocumentBuilder;
use App\Entity\Document;
use InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class DocumentDenormalizer implements DenormalizerInterface
{
    public function __construct(
        protected DocumentBuilder $documentBuilder
    ) {
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Document
    {
        if (isset($data['base64'])) {
            return $this->documentBuilder->buildFromString(
                base64: $data['base64'],
                name: $data['name']
            );
        } else {
            throw new InvalidArgumentException(sprintf(
                'Cannot deserialize a `%s` without a base64!',
                Document::class,
            ));
        }
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return $type === Document::class && !$data instanceof Document;
    }
}
