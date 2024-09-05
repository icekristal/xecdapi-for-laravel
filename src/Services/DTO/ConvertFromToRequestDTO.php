<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class ConvertFromToRequestDTO extends DTOBase
{
    protected string $from = "USD";
    protected string $to = "EUR";
    protected float|int $amount = 1;
    protected bool $obsolete = false;
    protected bool $inverse = false;
    protected float|int $decimal_places = 4;
    /**
     * OPTIONAL – This parameter can be used to add a margin (-/+) to XE's mid-market rate.
     * Example: add margin=2.05 parameter to the endpoint and the
     * API will return our mid-market rates plus the margin of 2.05 percent
     * @var float|int
     */
    protected float|int $margin;
    protected bool $crypto = false;
    protected bool $skip_weekends = false;




}
