<?php


namespace App\Request\Passwords;


use App\DTO\Passwords\PasswordGroupDTO;
use App\Request\BaseRequest;

/**
 * Class InsertPasswordsGroupsRequest
 * @package App\Request\Passwords
 */
class InsertPasswordsGroupsRequest extends BaseRequest
{

    const REQUEST_URI = "/api/passwords/insert-groups";

    /**
     * @var PasswordGroupDTO[] $passwordsGroupsDtos
     */
    private array $passwordsGroupsDtos = [];

    /**
     * @return PasswordGroupDTO[]
     */
    public function getPasswordsGroupsDtos(): array
    {
        return $this->passwordsGroupsDtos;
    }

    /**
     * @param PasswordGroupDTO[] $passwordsGroupsDtos
     */
    public function setPasswordsGroupsDtos(array $passwordsGroupsDtos): void
    {
        $this->passwordsGroupsDtos = $passwordsGroupsDtos;
    }

    /**
     * Returns the array string representation of current request
     *
     * @return array
     */
    public function toArray(): array
    {
        $passwordsGroupsDtosAsArray = array_map(
            fn(PasswordGroupDTO $passwordGroupDTO) => $passwordGroupDTO->toArray(),
            $this->passwordsGroupsDtos
        );
        return $passwordsGroupsDtosAsArray;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return self::REQUEST_URI;
    }
}