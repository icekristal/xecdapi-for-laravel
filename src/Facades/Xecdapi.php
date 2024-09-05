<?php

namespace Icekristal\XecdapiForLaravel\Facades;

use Icekristal\XecdapiForLaravel\Services\DTO\AccountInfoResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\CentralBankExchangeRateResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\ConvertFromResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\ConvertToResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\CurrenciesResponseDTO;
use Icekristal\XecdapiForLaravel\Services\XecdapiService;
use Illuminate\Support\Facades\Facade;

/**
 *  @see Icekristal\XecdapiForLaravel\Services\XecdapiService
 *
 * @method static AccountInfoResponseDTO getAccountInfo()
 * @method static CurrenciesResponseDTO getCurrencies()
 * @method static XecdapiService setQueryParams(array $queryParams)
 * @method static ConvertFromResponseDTO convertFrom()
 * @method static ConvertToResponseDTO convertTo()
 * @method static CentralBankExchangeRateResponseDTO centralBankExchangeRate()
 * @method static float|int fastConvertFiat(string $from, string $to, float|int $amount = 1)
 *
 */
class Xecdapi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ice.xecdapi_service';
    }
}
