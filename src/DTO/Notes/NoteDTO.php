<?php

namespace App\PmsIo\DTO\Notes;

/**
 * Class NoteDTO
 * @package App\DTO\Notes
 */
class NoteDTO
{
    const KEY_ID          = "id";
    const KEY_TITLE       = "title";
    const KEY_BODY        = "body";
    const KEY_CATEGORY_ID = "categoryId";

    /**
     * @var string $id
     */
    private string $id = "";

    /**
     * @var string $title
     */
    private string $title = "";

    /**
     * @var string $body
     */
    private string $body = "";

    /**
     * @var string $categoryId
     */
    private string $categoryId = "";

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
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
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @param string $categoryId
     */
    public function setCategoryId(string $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Returns dto data in form of string
     *
     * @return string
     */
    public function toJson(): string
    {
        $dataArray = $this->toArray();
        return json_encode($dataArray);
    }

    /**
     * Returns dto data in form of array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            self::KEY_ID          => $this->getId(),
            self::KEY_TITLE       => $this->getTitle(),
            self::KEY_BODY        => $this->getBody(),
            self::KEY_CATEGORY_ID => $this->getCategoryId(),
        ];
    }
}