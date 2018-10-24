<?php

declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Dto\FileExport;
use App\Entity\Book;

/**
 * @author Grégoire Hébert gregoire@les-tilleuls.coop
 */
class FileExportDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function getCollection(string $resourceClass, string $operationName = null)
    {
        $book = new Book();
        $book->setTitle("tintin");
        $book->setDescription("here");

        return [$book];
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === FileExport::class;
    }
}
