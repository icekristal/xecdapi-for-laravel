<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class CentralBankRateDTO extends DTOBase
{
    protected string $quotecurrency;
    protected float|int $mid;
    protected float|int $inverse;
    protected float|int $bid;
    protected float|int $ask;
}
