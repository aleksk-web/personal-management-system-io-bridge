<?php

namespace App\DTO\Notes;

/**
 * Class NoteCategoryDTO
 * @package App\DTO\Notes
 */
class NoteCategoryDTO
{
    const KEY_ICON      = "icon";
    const KEY_NAME      = "name";
    const KEY_COLOR     = "color";
    const KEY_PARENT_ID = "parentId";

    /**
     * @var string $icon
     */
    private string $icon = "";

    /**
     * @var string $name
     */
    private string $name = "";

    /**
     * @var string $color
     */
    private string $color = "";

    /**
     * @var string $parentId
     */
    private string $parentId = "";

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getParentId(): string
    {
        return $this->parentId;
    }

    /**
     * @param string $parentId
     */
    public function setParentId(string $parentId): void
    {
        $this->parentId = $parentId;
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
            self::KEY_ICON      => $this->getIcon(),
            self::KEY_NAME      => $this->getName(),
            self::KEY_COLOR     => $this->getColor(),
            self::KEY_PARENT_ID => $this->getParentId(),
        ];
    }
}