<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class CentralBankExchangeRateResponseDTO extends DTOBase
{
    /**
     * @var string
     */
    protected string $terms;
    protected string $privacy;
    protected string $from;
    protected string $timestamp;
    protected int|float $amount;
    protected Collection|array|null $to;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->to = collect();
        if (isset($data['to'])) {
            foreach ($data['to'] as $rates) {
                $this->to->push(new CentralBankRateDTO($rates));
            }
        }
    }

}
