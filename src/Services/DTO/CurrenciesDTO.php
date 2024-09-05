<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;

class CurrenciesDTO extends DTOBase
{
    public string $iso;
    public string $currency_name;
    public bool $is_obsolete;
    public string $superseded_by;
    public string $currency_symbol;
    public bool $currency_symbol_on_right;

}
