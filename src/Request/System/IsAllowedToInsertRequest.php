<?php

namespace App\PmsIo\Request\System;

use App\PmsIo\Request\BaseRequest;

class IsAllowedToInsertRequest extends BaseRequest
{
    const REQUEST_URI = "/api/system/is-allowed-to-insert";

    /**
     * Returns the array string representation of current request
     *
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return self::REQUEST_URI;
    }
}