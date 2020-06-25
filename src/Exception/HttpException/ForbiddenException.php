<?php

declare(strict_types=1);

namespace PHPCensor\Exception\HttpException;

use PHPCensor\Exception\HttpException;

class ForbiddenException extends HttpException
{
    /**
     * @var int
     */
    protected $errorCode = 403;

    /**
     * @var string
     */
    protected $statusMessage = 'Forbidden';
}
