<?php

namespace Icekristal\XecdapiForLaravel\Services;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Stringable;

class DTOBase implements Arrayable, Jsonable, Stringable
{

    protected bool $isError = false;

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }
            if(method_exists($this, 'set'.ucfirst($key))){
                $this->{'set'.ucfirst($key)}($value);
                continue;
            }
            $this->{$key} = $value;
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @param $options
     * @return bool|string
     */
    public function toJson($options = 0): bool|string
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->isError;
    }

}
