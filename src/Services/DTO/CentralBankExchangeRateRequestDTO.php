<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class CentralBankExchangeRateRequestDTO extends DTOBase
{
    /**
     * @var string
     */
    protected string $central_bank = "USA";
    protected string $to;
    protected float|int $amount;
    protected string $date;
    protected bool $inverse;
    protected float|int $decimal_places;
    protected float|int $margin;
    protected string $fields = 'mid';


    /**
     * @param string $central_bank
     * @return $this
     */
    public function setCentralBank(string $central_bank): CentralBankExchangeRateRequestDTO
    {
        $this->central_bank = in_array($central_bank, [
            'AFG', 'AGO', 'ALB', 'AUS', 'AZE', 'BEAC', 'BGR', 'BHS', 'BLZ', 'BRA', 'CAN',
            'CAR', 'CHE', 'CHL', 'CHN', 'COL', 'CRI', 'CZE', 'DNK', 'DOM', 'ECB', 'EGY', 'FJI',
            'GBR', 'GTM', 'GUY', 'HUN', 'IDN', 'IND', 'ISR', 'JPN', 'KEN', 'KOR', 'LOA', 'LBN',
            'MEX', 'MMR', 'MNG', 'MOZ', 'NGA', 'NOR', 'REP', 'PHL', 'PNG', 'POL', 'PRY', 'QAT', 'ROU',
            'RUS', 'SAU', 'SRB', 'SVN', 'SWE', 'SYC', 'SYR', 'THA', 'TJK', 'TKM', 'TUR', 'UAE', 'UKR', 'URY',
            'USA', 'UZB', 'VEN', 'YEM', 'ZAF', 'ZWE'
        ]) ? $central_bank : 'USA';
        return $this;
    }


}
