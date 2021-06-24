<?php


namespace App\PmsIo\Request\Passwords;


use App\PmsIo\DTO\Passwords\PasswordDTO;
use App\PmsIo\Request\BaseRequest;

/**
 * Class InsertPasswordsRequest
 * @package App\Request\Passwords
 */
class InsertPasswordsRequest extends BaseRequest
{

    const REQUEST_URI = "/api/passwords/insert-passwords";

    /**
     * @var PasswordDTO[] $passwordDtos
     */
    private array $passwordDtos = [];

    /**
     * @return PasswordDTO[]
     */
    public function getPasswordDtos(): array
    {
        return $this->passwordDtos;
    }

    /**
     * @param PasswordDTO[] $passwordDtos
     */
    public function setPasswordDtos(array $passwordDtos): void
    {
        $this->passwordDtos = $passwordDtos;
    }

    /**
     * Returns the array string representation of current request
     *
     * @return array
     */
    public function toArray(): array
    {
        $passwordsDtosAsArray = array_map(
            fn(PasswordDTO $passwordDto) => $passwordDto->toArray(),
            $this->passwordDtos
        );
        return $passwordsDtosAsArray;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return self::REQUEST_URI;
    }
}