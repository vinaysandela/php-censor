<?php

declare(strict_types=1);

namespace PHPCensor\Exception\HttpException;

use PHPCensor\Exception\HttpException;

class BadRequestException extends HttpException
{
    /**
     * @var int
     */
    protected $errorCode = 400;

    /**
     * @var string
     */
    protected $statusMessage = 'Bad Request';
}
