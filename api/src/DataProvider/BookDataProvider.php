<?php

declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Book;

class BookDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function getCollection(string $resourceClass, string $operationName = null)
    {
        $book = new Book();
        $book->setId(1);
        $book->setTitle('Tintin objective Moon');
        $book->setDescription('another step where tintin does not belong.');

        yield $book;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
//        return false;
        return $resourceClass === Book::class;
    }
}
