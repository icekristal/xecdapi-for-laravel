<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class ConvertToResponseDTO extends DTOBase
{
    protected string $terms;
    protected string $privacy;
    protected string $to;
    protected float|int $amount;
    protected string $timestamp;
    protected ?Collection $from;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->from = collect();
        if (isset($data['from'])) {
            foreach ($data['from'] as $rates) {
                $this->from->push(new ConvertRateDTO($rates));
            }
        }

    }
}
