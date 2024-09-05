<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class ConvertFromResponseDTO extends DTOBase
{
    protected string $terms;
    protected string $privacy;
    protected string $from;
    protected float|int $amount;
    protected string $timestamp;
    protected ?Collection $to;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->to = collect();
        if (isset($data['to'])) {
            foreach ($data['to'] as $rates) {
                $this->to->push(new ConvertRateDTO($rates));
            }
        }

    }
}
