<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\RentBook;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"Book:write"}},
 *     denormalizationContext={"groups"={"Book:read"}},
 *     collectionOperations={
 *         "get","post",
 *          "rent"={"method"="GET", "path"="/Books/rent", "controller"=RentBook::class}
 *     },
 *     itemOperations={
 *      "get"={"path"="/myBooks"}
 *     }
 *   )
 * @ORM\Entity
 * @ApiFilter(SearchFilter::class, properties={"title"="partial"})
 * @ApiFilter(PropertyFilter::class)
 */
class Book
{
    /**
     * @ApiProperty(identifier=true)
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @var string
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Column
     */
    private $title;

    /**
     * @var string
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Column
     */
    private $description;

    /**
     * @var Author
     * @Groups({"Book:read", "Book:write"})
     * @ORM\OneToOne(targetEntity=Author::class)
     */
    private $author;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Author
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }
}
