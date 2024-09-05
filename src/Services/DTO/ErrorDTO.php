<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;

class ErrorDTO extends DTOBase
{
    protected bool $isError = true;
    protected int $code;
    protected string $message;
    protected array $details = [];

}
