<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class CurrenciesResponseDTO extends DTOBase
{
    public string $terms;
    public string $privacy;
    public ?Collection $currencies;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->currencies = collect();
        if (isset($data['currencies'])) {
            foreach ($data['currencies'] as $currency) {
                $this->currencies->push(new CurrenciesDTO($currency));
            }
        }
    }

}
