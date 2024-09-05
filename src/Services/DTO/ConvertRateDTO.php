<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class ConvertRateDTO extends DTOBase
{
    protected string $quotecurrency;
    protected float|int $mid;
}
