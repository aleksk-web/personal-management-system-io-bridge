<?php


namespace App\PmsIo\Request\Notes;

use App\PmsIo\DTO\Notes\NoteCategoryDTO;
use App\PmsIo\Request\BaseRequest;

/**
 * Class InsertNotesCategoriesRequest
 * @package App\Request\Notes
 */
class InsertNotesCategoriesRequest extends BaseRequest
{

    const REQUEST_URI = "/api/notes/insert-categories";

    /**
     * @var NoteCategoryDTO[] $categoriesDtos
     */
    private array $categoriesDtos = [];

    /**
     * @return NoteCategoryDTO[]
     */
    public function getCategoriesDtos(): array
    {
        return $this->categoriesDtos;
    }

    /**
     * @param NoteCategoryDTO[] $categoriesDtos
     */
    public function setCategoriesDtos(array $categoriesDtos): void
    {
        $this->categoriesDtos = $categoriesDtos;
    }

    /**
     * Returns the array string representation of current request
     *
     * @return array
     */
    public function toArray(): array
    {
        $notesCategoriesDtosAsArrays = array_map(
            fn(NoteCategoryDTO $noteCategoryDTO) => $noteCategoryDTO->toArray(),
            $this->categoriesDtos
        );
        return $notesCategoriesDtosAsArrays;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return self::REQUEST_URI;
    }
}