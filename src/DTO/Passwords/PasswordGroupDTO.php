<?php

namespace App\PmsIo\DTO\Passwords;

/**
 * Class PasswordGroupDTO
 * @package App\DTO\Passwords
 */
class PasswordGroupDTO
{
    const KEY_ID   = "id";
    const KEY_NAME = "name";

    /**
     * @var string $id
     */
    private string $id = "";

    /**
     * @var string $name
     */
    private string $name = "";

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
            self::KEY_ID   => $this->getId(),
            self::KEY_NAME => $this->getName(),
        ];
    }
}