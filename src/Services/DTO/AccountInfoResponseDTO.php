<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;

class AccountInfoResponseDTO extends DTOBase
{
    public string $id;
    public string $organization;
    public string $package;
    public string $service_start_timestamp;
    public string $package_limit_duration;
    public int $package_limit = 0;
    public int $package_limit_remaining = 0;
    public string $package_limit_reset;

}
