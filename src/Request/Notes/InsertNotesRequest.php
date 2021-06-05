<?php


namespace App\Request\Notes;


use App\DTO\Notes\NoteDTO;
use App\Request\BaseRequest;

/**
 * Class InsertNotesRequest
 * @package App\Request\Notes
 */
class InsertNotesRequest extends BaseRequest
{

    const REQUEST_URI = "/api/notes/insert-notes";

    /**
     * @var NoteDTO[] $notesDtos
     */
    private array $notesDtos = [];

    /**
     * @return NoteDTO[]
     */
    public function getNotesDtos(): array
    {
        return $this->notesDtos;
    }

    /**
     * @param NoteDTO[] $notesDtos
     */
    public function setNotesDtos(array $notesDtos): void
    {
        $this->notesDtos = $notesDtos;
    }

    /**
     * Returns the array string representation of current request
     *
     * @return array
     */
    public function toArray(): array
    {
        $notesDtosAsArrays = array_map(
            fn(NoteDTO $noteDto) => $noteDto->toArray(),
            $this->notesDtos
        );
        return $notesDtosAsArrays;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return self::REQUEST_URI;
    }
}