<?php

namespace App\EventListener\Server;

use App\Entity\Document;
use App\Service\DocumentService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(
    event: Events::prePersist,
    method: '__invoke',
    entity: Document::class
)]
class DocumentPrePersistListener
{
    public function __construct(
        protected DocumentService $documentService
    ) {
    }

    public function __invoke(Document $document, PrePersistEventArgs $event): Document
    {
        $filePath = $this->documentService->getDocumentPath($document);

        file_put_contents($filePath, base64_decode($document->getBase64()));

        return $document;
    }
}
