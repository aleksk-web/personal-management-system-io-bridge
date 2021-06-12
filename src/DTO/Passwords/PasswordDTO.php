<?php

namespace App\PmsIo\DTO\Passwords;

/**
 * Class PasswordDTO
 * @package App\DTO\Passwords
 */
class PasswordDTO
{
    const KEY_ID          = "id";
    const KEY_LOGIN       = "login";
    const KEY_PASSWORD    = "password";
    const KEY_URL         = "url";
    const KEY_DESCRIPTION = "description";
    const KEY_GROUP_ID    = "groupId";

    /**
     * @var string $id
     */
    private string $id = "";

    /**
     * @var string $login
     */
    private string $login = "";

    /**
     * @var string $password
     */
    private string $password = "";

    /**
     * @var string $url
     */
    private string $url = "";

    /**
     * @var string $description
     */
    private string $description = "";

    /**
     * @var string $groupId
     */
    private string $groupId = "";

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
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
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
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     */
    public function setGroupId(string $groupId): void
    {
        $this->groupId = $groupId;
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
            self::KEY_LOGIN       => $this->getLogin(),
            self::KEY_PASSWORD    => $this->getPassword(),
            self::KEY_URL         => $this->getUrl(),
            self::KEY_DESCRIPTION => $this->getDescription(),
            self::KEY_GROUP_ID    => $this->getGroupId(),
        ];
    }
}