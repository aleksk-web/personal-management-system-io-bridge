<?php

namespace App\PmsIo\Request\System;

use App\PmsIo\Request\BaseRequest;

class SetTransferDoneStateRequest extends BaseRequest
{
    const REQUEST_URI = "/api/system/mark-state-as-transferred";

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