<?php

namespace Icekristal\XecdapiForLaravel\Facades;

use Icekristal\XecdapiForLaravel\Services\DTO\AccountInfoResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\CurrenciesResponseDTO;
use Icekristal\XecdapiForLaravel\Services\XecdapiService;
use Illuminate\Support\Facades\Facade;

/**
 *  @see Icekristal\XecdapiForLaravel\Services\XecdapiService
 *
 * @method static AccountInfoResponseDTO getAccountInfo()
 * @method static CurrenciesResponseDTO getCurrencies()
 * @method static XecdapiService setQueryParams(array $queryParams)
 *
 */
class Xecdapi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ice.xecdapi_service';
    }
}
